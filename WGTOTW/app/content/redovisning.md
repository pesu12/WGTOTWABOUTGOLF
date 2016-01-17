*Redovisning*
====================================

*Kmom01: PHP-baserade och MVC-inspirerade ramverk*
------------------------------------

Till denna uppgift använder jag Windows 7. Jag är inte så bekant med ramverk sedan
tidigare men min uppfattning är att jag tycker det är bra med ramverk och MVC och Anax.
Jag gjorde inga förbättringar i den Anax som fanns och tycker att Anax är bra för att få en
bra struktur på koden genom att jag tvingas följa en viss struktur då jag gör hemsidan.
Samtidigt hade jag lite problem och tycker att det var lite svår i början att komma in i
MVC-strukturen. Min lösning tycker jag gick bra att göra. Jag döpte min anax till PsWeb.
Det gick bra att lägga in source.php. Det var effektivt att source fanns upplagt på
GitHub så att det vara bara att klona csource-respositoryt.
Läste inte igenom “20 steg för att komma igång PHP” eftersom jag hade gjort detta när jag
gick oophp-kursen.
Det enda jag saknade i övningen var hur man skulle tänka när man lägger in bilder.
Jag gjorde så att jag lade img src='img/me/me.jpg' i min me.md sida.
Sedan hade jag lite problem med att se om min navbar blev rätt implementerad eller inte.
Kanske skulle det vara bra att se ett färdigt exempel på en front-sida med en navbar som
ska vara enligt me-sidan.

Angående begrepp har jag hört talas om MVC men inte använt det själv.Hörde talas
om markdown i oophp kursen. Det var första gången jag hörde talas om byline.
Tycker att det är bra att lära sig dessa termer eftersom de förmodligen är
vanliga ord som används vid design av hemsidor.



*Kmom02: Kontroller och modeller*
------------------------------------

**Hur känns det att jobba med Composer?**
Det känns bra att köra Composer. Jag installerade Composer lokalt på min dator
via Windows installer och lade sedan till sökvägen för Composer i min
miljövariabel PATH. Startade därefter programmet via en terminal som har jag har
för gitbash. Tycker att det gick bra att hämta phpmvc/comment med Composer.
Det tog ett tag för mig att veta i vilken folder jag skulle packa upp
phpmvc/comment med Composer men jag tycker att de löste sig sedan då
jag kopierade in vendor-filerna i mitt eget projekt.

**Vad tror du om de paket som finns i Packagist, är det något du kan tänka dig
att använda och hittade du något spännande att inkludera i ditt ramverk?**
Jag skulle kunna tänka mig att använda de paket som finns för loggning
som paketen psr/log och monolog/monolog. Jag vet att i utvecklarna på
mitt arbete använder väldigt mycket av externa log-bibliotek eftersom
det underlättar felsökning när man ser vilken data som går genom systemet.
Skulle även kunna tänka mig att använda paketet phpunit/phpunit som
används för att unit-testa php vilket kan behövas i dagens utvecklingsprocesser
då koden blir mer och mer komplex.

**Hur var begreppen att förstå med klasser som kontroller som tjänster
som dispatchas, fick du ihop allt?**
Jag tycker att själva konceptet med ramverk och MVC modeller bra.
Anser att då man har ramverk så blir man mer låst till program-strukturen
men det blir inte så mycket systemeringsfel då. Sedan känns det bra att ha
ett ramverk att utgå ifrån så att man inte behöver göra allt från början
för varje gång som man ska göra en hemsida.
Jag fick läsa igenom kapitlet om "Utöka Anax MVC med kommentarer och pröva
pakethantering med PHP" ett par gånger för att förstå konceptet med
kontroller och tjänster som dispatchas.
Jag gillade bilden "Ett flöde enligt MVC" vilket gjorde att jag fick en
överblick över MVC-modellen.

**Hittade du svagheter i koden som följde med phpmvc/comment?
Kunde du förbättra något?**
Det jag hittade som jag tyckte var lite problem var att det gick inte i
view comment-filerna (comments.tpl.php, edit.tpl.php, form.tpl.php) att
sätta om värden på php-variabler då raden började med <?= . Jag bytte
ut php-raderna så att de började med <?php istället.
Sedan tycker jag att det var svårt att skriva in kommentarer i
view comment-filerna. Nu använde jag <?php //xxxx. Detta tycker jag
borde kunna göras på något lättare sätt.


*Kmom03: Bygg ett eget tema*
------------------------------------

**Vad tycker du om CSS-ramverk i allmänhet och vilka tidigare erfarenheter har du av dem?**
Jag har tyvärr inga tidigare erfarenheter av CSS-ramverk då de webdesignkurser som jag
gått tidigare bara har tagit upp html,css och php.
Jag tycker att det är bra med CSS-ramverk i allmänhet eftersom det tvingar en att skriva
sin kod på ett strukturerat sätt och det är även bra att ramverk finns så att hjulet
inte uppfinns på nytt varje gång som webdesign ska göras.
Jag kan tycka att det kan ta lite lång tid ibland att komma in och lära säg att använda
ramverket men det går bättre och bättre ju mer man tränar. Fast jag kan nog tänka mig
att tröskeln kan bli ganska hög för den som ska göra sin webdesign för allra första
gången.

**Vad tycker du om LESS, lessphp och Semantic.gs?**
Jag tycker att det är bra med LESS, lessphp och Semantic.gs då jag tycker att det
är tydligare att skriva css som @variabler än som ren css. Jag kan även tänka mig
att det hjälper med LESS vid stora webdesignprojekt då det är många personer
inblandade. Jag gillade även tanken på att man får förslag och hjälp med fonter,
färger och storlekar på olika element vilket gör jag tycker att websidan
ger ett bättre synintryck än om jag helt skulle välja min CSS själv med tanke
på fonter, färger och storlekar på element.
Det gick bra att installera lessphpkompilatorn då jag tycker att det är bra
att allt finns på github. Det var även bra med test-sidan för style.php där
man direkt kunde se vad som kom ut i style.less , mer av test-sidor önskas.
Hade lite problem i början med Semantic.gs eftersom det tog ett tag att lista
ut hur det fungerade med style.php och @import men det löste sig efter att jag
hade tittat igenom forumet.

**Vad tycker du om gridbaserad layout, vertikalt och horisontellt?**
Jag tycker att det är bra med gridbaserad layout då jag upplever
att det är lättare att flytta runt kolumner och rader utan att tänka på
vad de innehåller är och att jag inte behöver tänka på beroendet mellan
kolumner och rader. Känns bra att lära sig lite om det magiska talet 22
eftersom jag själv kan känna att jag behöver förbättra på mina kunskaper om
font-storlekar och få bättre kunskap om hur en sida blir vackrare.
Jag har inte haft några tankar på om jag ska använda enbart vertikal
eller horisontellt gridlayout. En kombination av både vertikal och horisontell
gridlayout är nog det bästa då jag kan tänka mig att använda horisontell
för main, sidobarer och sedan använda vertikal för features och footers.

**Har du några kommentarer om Font Awesome, Bootstrap, Normalize?**
Jag har inga tidigare erfarenheter av Font Awesome, Bootstrap, Normalize.
Gillar Font Awsome eftersom det ibland kan vara lättare att bara hämta
vissa ikoner än att skapa dessa själva. Gillar även Normalize eftersom
vi har problem på mitt arbete att anpassa web-designen till olika
sorters läsare.
Jag har ingen erfarenhet av Twitter Bootstrap innan men kan tänka mig att
Bootstrap gör väldigt stor nytta när man arbetar med mobila enheter.
Jag gick en kurs på BTH för ett par år sedan som heter DV1406 Webbdesign och
användbarhet. DV1406 tog upp bristen just med att mobila enheter inte klarar
den vanliga hemsidor på grund av att mobila enheter nästan alltid har en mindre
storlek på skärmen och att när man förstorar/förminskar en vanlig hemsida på
en mobil enhet så hänger inte layouten på den mobila enheten med.
Jag tycker därför att det är bra att det finns support just för responsive
så att det går att få en bra layout även på mobila enheter.

**Beskriv ditt tema, hur tänkte du när du gjorde det, gjorde du några utsvävningar?**
Jag tänkte tydlighet, enkelhet och överskådlighet. Med tydlighet menar jag att
det ska vara tydligt att läsa det som står. Bakgrundsfärgen är vit och texten
är svart då jag tycker att texten syns bäst på vitt mot svart bakgrund.
Min favicon gjorde jag i windows paint och är tydligast i vitt och svart.
Enkelhet står för att jag inte ska blanda in några tunga bilder eller videor
som tar tid att ladda.  Överskådlighet står för att se till att de viktiga
delarna main och sidebar ska synas bäst.
Mitt tema består överst av ikon till vänster och header till höger. Sedan har
jag navbar under och därefter har jag flash och features. Featured innehåller extra viktig
text som är en introduktion till sidan. Main och sidebar är under featured-texten.
Sidebar innehåller länkar till övriga delar på sidan. Sidebar och mainbar har ett
horisontellt rutnät.
Under mainbar och sidebar har jag tre stycken triptych som visar viktiga delar
av texten. Under triptych har jag lagt in fotkolumner med extralänkar som är bra
att ha. Triptych och fotkolumner består av ett vertikalt rutnät.
Jag har lagt in responsive.

Jag gjorde inga extra utsvängningar då jag vill behålla enkelheten och
överskådligheten på temasidan.

Länk till min me-sida
http://www.student.bth.se/~pesu12/phpmvc/kmom03/PsWeb/webroot/me.php

*Kmom04: Databasdrivna modeller*
------------------------------------

**Vad tycker du om formulärhantering som visas i kursmomentet?**
Jag tycker att den formulärhantering som visades var bra på så sätt att jag gillar
att formuläret är utbrutet i en egen class med enbart formuläret. Detta gör att
formulär blir väldigt modulärt och att jag lätt kan ange att lägga till formulär
i mitt ramverk genom att skapa "new \Anax\HTMLForm\CForm". Det är bra att olika
varianter har visats i exemplen. Hur man validerar fält på ett bra sätt och hur
man använder checkboxar i formulär vilket jag själv har inkluderat i mitt userformulär.

**Vad tycker du om databashanteringen som visas, föredrar du kanske traditionell SQL?**
Jag gillar databashanteringen då den var lätt att komma igång med genom att vi hade en hel
del databashantering i OOPHP kursen. Använder själv en hel del MySQL på mitt arbete
så det fick bli MySQL som jag använde istället för SQLite.
Jag har hört att det har börjats ta betalt av företag för Mysql vilket gör att jag
mer och mer har börjat gå över till Mariadb då Mariadb är gratis.

**Gjorde du några vägval, eller extra saker, när du utvecklade basklassen för modeller?**
Det jag gjorde var att jag flyttade filen CommentsInSession till MVC och
döpte filen CommentsInSession.php till CCommentModel.php. Flytten gjorde
jag för att jag verkligen ville använda MVC-konceptet som denna kurs går
ut på. Jag känner att jag har tappat bort mig lite i MVC-konceptet genom
att det är många filer att hantera i ramverket. Det jag fick göra var
att gå tillbaka till kmom02 och titta på "Ett flöde enligt MVC" som jag
använder som röd tråd för att förstå konceptet med MVC.
I filen "MVC\CCommentModel.php" fick jag lägga in key för att separera
de olika kommentarssidorna.

**Beskriv vilka vägval du gjorde och hur du valde att implementera kommentarer i databasen.**
Jag valde att implementera kommentarer i databaser med en tabell för kommentarsida 1 och
en annan tabell för kommentarsida 2. Orsaken till att jag gjorde 2 tabeller var för att
jag vill lätt kunna skapa och radera den ena kommentarstabellen i databasen utan att
det påverkar den andra kommentarstabellen. Jag valde även att lägga in tiden för skapande
av kommentaren som gmdate. För att visa hur länge en kommentar har varit aktiv
så har jag gjort om gmdate till timestamp och tagit skillnaden mellan nu-tid och tiden
för när kommentaren skapades för att på så sätt kunna visa hur länge som kommentaren varit
aktiv.
Jag lade inte in något extra id-fält för kommentaren utan använder den id som står i
första kolumnen och som automatiskt räknas upp för varje gång som det skapas en ny
rad i databasen. Ett problem som jag upptäckte var att i Mysql så skapas inte id till
1 då alla kommentarerna hade blivit raderade så jag lade in en check att om det var
den sista kommentaren som raderades så droppade jag kommentarstabellen i databasen och sedan
skapade jag en ny kommentarstabell så att id börjar om från 1 igen när jag lägger in
nya kommentarer igen.

**Gjorde du extrauppgiften? Beskriv i så fall hur du tänkte och vilket resultat du fick.**
Nej, jag gjorde inte extrauppgiften.

Länk till min me-sida
http://www.student.bth.se/~pesu12/phpmvc/kmom04/PsWeb/webroot/me.php
