#!/bin/bash
cd $(dirname $0)
wget -q -O sitematrix.xml "http://meta.wikimedia.org/w/api.php?action=sitematrix&format=xml"
chmod 0600 sitematrix.xml
./siteupdater.php > sites.php
chmod 0644 sites.php
