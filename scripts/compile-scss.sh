#!/usr/bin/env bash

if [ -z "$2" ]; then
  echo "Usage: $0 <scss-file> <output-file>"
  exit 1
fi

cd "$(dirname "$0")/.." || exit 1

SOURCE=$1
OUTPUT=$2

buildArgs=("--load-path=node_modules" "--no-charset")

if [ "$RELEASE" == "true" ]; then
  buildArgs+=("--style=compressed" "--no-source-map")
else
  buildArgs+=("--update" "--embed-sources")
fi

read -ra passArgs <<<"${buildArgs[@]}"

./node_modules/.bin/sass "${passArgs[@]}" "$SOURCE" "$OUTPUT"

if [ "$RELEASE" == "true" ]; then
  ./node_modules/.bin/postcss "$OUTPUT" --use autoprefixer --no-map --dir "$(dirname "$OUTPUT")"
fi
