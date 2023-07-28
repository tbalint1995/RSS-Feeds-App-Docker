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

## FELADAT LEÍRÁSA

Készítsen egy alkalmazást, aminek fő funkciója egy weboldalon a felhasználók által hozzáadott RSS feedek legutolsó 5-8 eseményének megjelenítése. A felhasználó belépés után legyen képes alapvető CRUD műveleteket végezni rajtuk és az alkalmazás tárolja el a módosításokat. A weboldal rendszeresen kerüljön frissítésre 2 és 30 perc között választható időintervallumban.
