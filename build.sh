#!/bin/bash
# usage: bash build.sh containerdir googleanalyticsacc

SRCDIR="$( cd "$( dirname "$0" )" && pwd )"
OUTDIR="$1/omfgupgrade"
GA=$2

rm -rf $OUTDIR
cp -R $SRCDIR $OUTDIR
cd $OUTDIR

rm build.sh
rm -rf .git
sed -i '' -e "s/##GA##/$GA/" index.php

python - <<EOF
import re, subprocess

def css(m):
	proc = subprocess.Popen(["yuicompressor", "--type", "css"], stdin=subprocess.PIPE, stdout=subprocess.PIPE)
	return "<style>" + proc.communicate(m.group(1))[0] + "</style>"

def js(m):
	proc = subprocess.Popen(["closure", "--language_in", "ECMASCRIPT5"], stdin=subprocess.PIPE, stdout=subprocess.PIPE)
	return "<script>" + proc.communicate(m.group(1))[0] + "</script>"

file = open("index.php").read()
file = re.sub("<style>((?:.|\n)+)</style>", css, file)
file = re.sub("<script>((?:.|\n)+)</script>", js, file)
open("index.php", "w").write(file)
EOF