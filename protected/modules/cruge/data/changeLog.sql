delimiter $$
CREATE TRIGGER cruge_authitem_trigger
AFTER UPDATE ON cruge_authitem
FOR EACH ROW
BEGIN
UPDATE cruge_authitemchild SET cruge_authitemchild.parent = NEW.name WHERE cruge_authitemchild.parent = OLD.name;
UPDATE cruge_authitemchild SET cruge_authitemchild.child = NEW.name WHERE cruge_authitemchild.child = OLD.name;
END$$
DROP TRIGGER cruge_authitem_trigger