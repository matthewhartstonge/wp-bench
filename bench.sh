# Build all required docker images first...
for dir in docker/php/*/ ; do
  trimDir=$(echo $dir | sed 's:/*$::')
  docker build --tag matthewhartstonge/php-bench:$trimDir ./$trimDir
done

# enableW3TotalCache enables w3-total-cache plugin in via the database.
enableW3TotalCache() {
  query=$(cat <<EOF
    USE    secret_db;
    UPDATE wp_options
    SET    option_value='a:1:{i:0;s:33:\"w3-total-cache/w3-total-cache.php\";}'
    WHERE  option_name='active_plugins';
EOF
);
  docker exec -it mariadb sh -c  "mysql -u root --password=super_secret_password -e \"${query}\"";
}

# disableW3TotalCache disables the w3-total-cache plugin via the database.
disableW3TotalCache() {
  query=$(cat <<EOF
    USE    secret_db;
    UPDATE wp_options
    SET    option_value='a:0:{}'
    WHERE  option_name='active_plugins';
EOF
);
  docker exec -it mariadb sh -c  "mysql -u root --password=super_secret_password -e \"${query}\"";
}

# bench brings up a docker stack and starts performing a benchmark.
bench() {
  # parameters
  trimDir=$1;
  runNumber=$2;
  enableW3Cache=$3;
  enableVarnish=$4;

  # Check which docker-compose stack to use.
  dockerComposeFile="docker-compose"
  if [ "${enableVarnish}" = true ]; then
    dockerComposeFile="${dockerComposeFile}.varnish"
  fi
  dockerComposeFile="${dockerComposeFile}.yml"

  #Start the php stack
  docker-compose -f "${trimDir}/wordpress/${dockerComposeFile}" up -d

  # Wait for the stack to fire up...
  sleep 10

  if [ "${enableW3Cache}" = true ]; then
    enableW3TotalCache;
  fi

  # Flood with requests...
  outputDir="./output/benchmark_${trimDir}"
  mkdir -p "${outputDir}"
  hey -z 60s -o csv http://localhost:80 >> "${outputDir}/${runNumber}.csv"

  if [ "${enableW3Cache}" = true ]; then
    disableW3TotalCache;
  fi

  # Teardown the stack...
  docker-compose -f "${trimDir}/wordpress/${dockerComposeFile}" down
}

main() {
  sep="--------------------------------------------------------";

  # Do ten rounds in order to average results.
  for i in {1..10}; do
    for dir in 7.*/ ; do
      trimDir=$(echo $dir | sed 's:/*$::');

      echo "${sep}";
      echo "Running benchmark for ${trimDir}...";
      echo "${sep}";

      case $trimDir in
        7.*-opcache-w3totalcache-varnish)
          bench "${trimDir}" $i true true;
          ;;

        7.*-opcache-w3totalcache)
          bench "${trimDir}" $i true;
          ;;

        7.*-opcache-varnish)
          bench "${trimDir}" $i false true;
          ;;

        7.2-opcache)
          bench "${trimDir}" $i;
          ;;

        7.*)
          bench "${trimDir}" $i;
          ;;
      esac;

      echo "${sep}";
      echo "Completed Benchmarking ${trimDir}";
      echo "${sep}";
    done;
  done;
}

main
