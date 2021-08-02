#!/bin/sh
set -eu
set -x

ref=$GITHUB_REF

# store commit message for later use
# https://stackoverflow.com/a/26132640/2314626
object=$(git rev-parse $ref)
message=$(git cat-file -p $object)
echo "$message" | tail -n +6 > RELEASE_NOTES.md
