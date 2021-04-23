Feladat:

Budapest hány kerületén kell keresztül mennünk ahhoz, hogy eljussunk az egyik kerületből a másikba? 
Két kerület közötti "távolság" egyenlő a legkevesebb köztük lévő kerületek számával +1.

Ez mit jelent?
A X. és XVI. kerület szomszédos, ezért a közöttük lévő kerületek száma 0, így távolságuk 1. 

A II. és XI. kerület között a legkevesebb kerületet átszelő út a XII. vagy az I. kerületen át vezető útvonal. Ezen kerületek között 1 kerületen kell áthaladni, így a távolságuk 2.

A függvény fogadjon el két egész számot, amely megadja, hogy Budapest mely két kerülete között szeretnénk a legkevesebb kerületet érintő úton eljutni.
A függvény térjen vissza a fent leírt számítás eredményével.

Opcionális kiegészítő feladat:
A kapott eredményeket egy MySQL táblába tároljuk el, a számítás időpontjával, bemeneti és kimeneti értékeivel.


Megoldás:

A kerületeket és szomszédaikat egy kétdimenziós tömbben ábrázoltam (ahol $districtDataInput[0] jelenti az 1. kerület szomszédos kerületeit, stb.).
A megoldáshoz egy Breadth-first Search rekurzív algoritmust használtam.
A kapott eredményt egy MySQL adatbázisban tárolom.

Kipróbálható: https://bp-districts.herokuapp.com/ (adatbázis-kapcsolat nélkül)
