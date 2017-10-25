#!/bin/bash
echo 'InitMediaPathServer'
cd backend/web
rm -f upload
ln -s ../../../upload upload
cd ../..
cd frontend/web
rm -f upload
ln -s ../../../upload upload
cd ../..
cd api/web
rm -f upload
ln -s ../../../upload upload
