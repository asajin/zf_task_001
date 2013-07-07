zf_task1
========

Programming task

1. To install simply place the contents of the system in a web accessible
folder.

2. Check in /library folder Zend folder if exists 
- if not, please download from https://packages.zendframework.com/releases/ZendFramework-1.11.11/ZendFramework-1.11.11-minimal.zip
- extract archive and find here ZendFramework-1.11.11-minimal/library/Zend folder
- copy content of this folder into /library/Zend folder of your programming task site

3. Open your Apache’s httpd.conf file. Inside, add the following code:

<VirtualHost *:80>
    ServerName programming_task.local
   DocumentRoot "<programming_task folder>/public/"
   <Directory "<programming_task folder>/public/">
   </Directory>
</VirtualHost>

4. You’ll also need to add the domain to your local hosts file.  
For Windows users, it should be in C:\Windows\System32\Drivers\etc. 
For Unix-based OS users, it should be in /etc/hosts. 
Open it up and add programming_task.local and point it to 127.0.0.1

5. Restart your web server

6. When you open programming_task.local on your browser, it should already point to your  programming task site.