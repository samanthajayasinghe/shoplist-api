CREATE TABLE device (
  id                  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name                VARCHAR(255),
  shop_date           datetime,
  created_at          datetime,
  status              enum('ACTIVE','IN-ACTIVE')
);

CREATE TABLE shop_list (
  id                  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  device_id           int(6),
  name                VARCHAR(255),
  DATE                datetime,
  status              enum('PENDING','IN-PROCESS','COMPLETED')
);

CREATE TABLE shop_list_item (
  id                  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  shop_list_id        int(6),
  name                VARCHAR(255),
  quantity            VARCHAR(255),
  note                VARCHAR(255),
  status              enum('PENDING','CANCELED','COMPLETED')
);
