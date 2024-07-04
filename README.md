# WEB-Drop-Editor for KO

I will explain it via XAMPP.
1-Microsoft DBO Sql Server library is required for installation. ([Download here](https://ko-yardim.com/yonlendirme?to=aHR0cHM6Ly9nby5taWNyb3NvZnQuY29tL2Z3bGluay8/bGlua2lkPTIyNTg4MTY=))
2-Copy the resulting DLL files to "xampp\php\ext".
3-Enter PHP.INI from xampp\php\.
4-Find ;extension=shmop and add the following below:
extension=php_pdo_sqlsrv_**82**_ts_x64.dll
extension=php_sqlsrv_**82**_ts_x64.dll

82 is my PHP version. If you are used 8.3* change this 83.

5-Edit **settings.php** according to your needs.

![image](https://github.com/alperkicirli/WEB-Drop-Editor/assets/137325060/04fd4f34-1b9c-4301-91d3-c17c94562fb1)
