@echo off
cd %~dp0backend/web
rd /Q upload
del /Q upload
mklink /D upload ..\..\frontend\web\upload
cd ../..
cd %~dp0api/web
rd /Q upload
del /Q upload
mklink /D upload ..\..\frontend\web\upload