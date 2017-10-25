#!/bin/bash
echo 'InitMediaPath'
cd backend/web
rm -f upload
ln -s ../../frontend/web/upload upload
cd ../..
cd api/web
rm -f upload
ln -s ../../frontend/web/upload upload
cd ../..
