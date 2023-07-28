# Readme

## App indítása:

1. `composer i`
2. `php artisan key:generate`
3. `php artisan migrate`
3. `npm i`
4. `npm run dev`
5. `php artisan serve`

## Cron:

A cron  beállításához szerkesztenünk kell a futtató gép (linux) crontab fájlját a következő parancs futtatásával::

`crontab -e`

Ez a parancs megnyitja a felhasználó crontab szerkesztőjét, ahol hozzáadhatjuk vagy módosíthatjuk a cron feladatokat:

`* * * * * php artisan /path/to/app/serve refresh-all-channels`

Ez a parancs percenként ellenőrzi mely csatornákat kell frissíteni, és végrehajtja a frissítést.

## RSS URL-ek

- https://www.hirstart.hu/site/publicrss.php?pos=vezeto&pid=74 Vezető hírek
- https://www.hirstart.hu/site/publicrss.php?pos=balrovat&pid=48 Autó-motor
- https://www.hirstart.hu/site/publicrss.php?pos=balrovat&pid=63 Baleset-bűnügy