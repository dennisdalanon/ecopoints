<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CouponsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared('CREATE trigger `get_serial_number` BEFORE INSERT ON `coupons`
            FOR EACH ROW
            BEGIN
            SET NEW.serial_number = (select serial_number from coupon_serial_numbers 
            where allocated is null limit 1);
            END;'
        );

        DB::unprepared('CREATE trigger `allocate_serial_number` AFTER INSERT ON `coupons`
            FOR EACH ROW
            BEGIN
            UPDATE coupon_serial_numbers set allocated = NEW.id where serial_number = NEW.serial_number;
            END;'
        );

        DB::unprepared('CREATE DEFINER=`scottw`@`%` FUNCTION `hash10`() RETURNS varchar(32) CHARSET utf8
    DETERMINISTIC
BEGIN
  DECLARE chars VARCHAR(62);
  DECLARE result VARCHAR(32);
  DECLARE i INT;
  SET chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
  SET result = "";
  SET i = 0;
  label: LOOP
    SET result = CONCAT(result, SUBSTRING(chars, FLOOR(RAND()*62) + 1, 1));
    SET i = i + 1;
    IF (SELECT MOD(i,4)) = 0 THEN
        SET result = CONCAT(result, "-");
    END IF;
    IF i = 23 THEN
      LEAVE label;
    END IF;
  END LOOP label;
  RETURN result;
END');

        DB::unprepared('CREATE DEFINER=`scottw`@`%` PROCEDURE `serial50`()
BEGIN
DECLARE i INT;
SET i = 0;
  label: LOOP
  SET i = i + 1;
  insert into coupon_serial_numbers(serial_number,created_at) values (hash10(),now());
  IF i = 50 then 
  LEAVE label;
    END IF;
  END LOOP;
  
  END');


        DB::unprepared('CREATE DEFINER=`scottw`@`%` PROCEDURE `ecopoints10`()
BEGIN
DECLARE i INT;
SET i = 0;
  label: LOOP
  SET i = i + 1;
  insert into coupon_serial_numbers(serial_number,created_at) values (hash10(),now());
  IF i = 1 then 
  LEAVE label;
    END IF;
  END LOOP;
  
  END');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::unprepared('drop function `hash10`');
        DB::unprepared('drop procedure `serial50`');
        DB::unprepared('drop procedure `ecopoints10`');


    }
}
