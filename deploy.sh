#!/usr/bin/env sh

git checkout production
git merge main
git push origin production
git checkout main

wget
