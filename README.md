Installation procedure on xampp linux server local env
1. folder structure
    --Projectname
    ----core (for app,system, etc)
    ----.htaccess
    ----favicon.ico
    ----index.php
    ----robots.txt
2. .htaccess configuration
    # Disable directory browsing
    Options All -Indexes

    # ----------------------------------------------------------------------
    # Rewrite engine
    # ----------------------------------------------------------------------

    # Turning on the rewrite engine is necessary for the following rules and features.
    # FollowSymLinks must be enabled for this to work.
    <IfModule mod_rewrite.c>
        Options +FollowSymlinks
        RewriteEngine On

        # Checks to see if the user is attempting to access a valid file,
        # such as an image or css document, if this isn't true it sends the
        # request to the front controller, index.php
        RewriteCond $1 !^(index.php|images|assets|doc|data|robots.txt)
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^(.*)$ ./index.php/$1 [L,QSA]  #gunakan nama foldernya yang diganti

        # Ensure Authorization header is passed along
        RewriteCond %{HTTP:Authorization} .
        RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
    </IfModule>

    <IfModule !mod_rewrite.c>
        # If we don't have mod_rewrite installed, all 404's
        # can be sent to index.php, and everything works as normal.
        ErrorDocument 404 index.php
    </IfModule>

    # Disable server signature start
        ServerSignature Off
    # Disable server signature end
3. change index.php from '../app/Config/Paths.php' to '/core/app/Config/Paths.php'
4. change /core/app/Config/App.php --> public string $baseURL = 'http://localhost/simpanx'; & public string $indexPage = '';
5. change folder permission --> sudo chmod 755 /opt/lampp/htdocs
6. change .htaccess permission --> chmod 644 .htaccess
7. change permission writable chache --> sudo chmod 777 /opt/l/h/simpanx/core/writable/chache
6. change /app/Config/Boot/production.php from --> ini_set('display_errors', '0'); to ini_set('display_errors', '1');