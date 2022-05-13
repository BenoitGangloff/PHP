DROP USER IF EXISTS 'admin'@'localhost';

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'WAoSBGA#50';

GRANT   ALL PRIVILEGES
ON      blog.*
TO      'admin'@'localhost';

FLUSH PRIVILEGES;