#!/bin/bash

for img in $1
do
    convert $img -resize 800 -verbose $img
    jpegoptim -m90 $img
done
