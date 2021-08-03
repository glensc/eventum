#!/bin/bash
set -xe

: ${DOCKER_ENV_LOAD:=}

if [ -f "$DOCKER_ENV_LOAD" ]; then
	. "$DOCKER_ENV_LOAD"
fi

# need to fetch tags first for release process
git fetch origin --unshallow "+refs/tags/v*:refs/tags/v*"

tag=${GITHUB_REF#refs/tags/}

# drop 'snapshot' tag, so that tarball created from snapshot gets identified better
# but before that, store result for later use
if [ "$tag" = "snapshot" ]; then
	# obtain current tag message
	# https://stackoverflow.com/a/26132640/2314626
	object=$(git rev-parse $tag)
	message=$(git cat-file -p $object)
	echo "$message" | tail -n +6 > release_note.txt

	git tag -d $tag
fi

# prepare release tarball
make dist
