for dir in */ ; do
  trimDir=$(echo $dir | sed 's:/*$::')
  cd $trimDir
  docker build --tag matthewhartstonge/php-bench:$trimDir .
  cd ..
done
