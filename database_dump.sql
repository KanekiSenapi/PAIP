-- ----------------------------
-- Sequence structure for Roles_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."Roles_id_seq";
CREATE SEQUENCE "public"."Roles_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for book_authors_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."book_authors_id_seq";
CREATE SEQUENCE "public"."book_authors_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for book_metadata_authors_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."book_metadata_authors_id_seq";
CREATE SEQUENCE "public"."book_metadata_authors_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for book_metadata_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."book_metadata_id_seq";
CREATE SEQUENCE "public"."book_metadata_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for book_publisher_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."book_publisher_id_seq";
CREATE SEQUENCE "public"."book_publisher_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for book_types_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."book_types_id_seq";
CREATE SEQUENCE "public"."book_types_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for books_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."books_id_seq";
CREATE SEQUENCE "public"."books_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for borrows_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."borrows_id_seq";
CREATE SEQUENCE "public"."borrows_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for sessions_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."sessions_id_seq";
CREATE SEQUENCE "public"."sessions_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_roles_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_roles_id_seq";
CREATE SEQUENCE "public"."users_roles_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for book_authors
-- ----------------------------
DROP TABLE IF EXISTS "public"."book_authors";
CREATE TABLE "public"."book_authors" (
  "id" int4 NOT NULL DEFAULT nextval('book_authors_id_seq'::regclass),
  "fullname" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of book_authors
-- ----------------------------
INSERT INTO "public"."book_authors" VALUES (1, 'Magdalena Kubasiewicz');
INSERT INTO "public"."book_authors" VALUES (2, 'Wojciech Chmielarz');
INSERT INTO "public"."book_authors" VALUES (3, 'Gary Keller');
INSERT INTO "public"."book_authors" VALUES (4, 'Jay Papasan');

-- ----------------------------
-- Table structure for book_metadata
-- ----------------------------
DROP TABLE IF EXISTS "public"."book_metadata";
CREATE TABLE "public"."book_metadata" (
  "id" int4 NOT NULL DEFAULT nextval('book_metadata_id_seq'::regclass),
  "isbn" varchar(13) COLLATE "pg_catalog"."default",
  "title" varchar COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "publisherId" int4,
  "publishmentYear" int4,
  "pagesNumber" int4 NOT NULL,
  "typeId" int4 NOT NULL
)
;

-- ----------------------------
-- Records of book_metadata
-- ----------------------------
INSERT INTO "public"."book_metadata" VALUES (1, '9788382106244', 'Przysługa dla Czarnoksiężnika Wilcza Jagoda Tom 2', 'Targi z czarnoksiężnikiem nigdy nie kończą się dobrze Przekonuje się o tym wiedźma Jagoda Wilczek, gdy na jej progu staje Caleb Blythe, któremu jest winna przysługę. Zadanie mogłoby się wydawać proste – Jagoda ma zadbać, aby przeżył najbliższe kilka dni i nikt nie poznał jego tożsamości. Tylko jak sobie poradzić z tym wyzwaniem, kiedy pod twoim dachem mieszka wścibska uczennica, na warszawskich ulicach giną czarownice, a po osiedlu zaczyna krążyć zdecydowanie zbyt wielu magicznych – w tym prawdopodobnie morderca oraz szpiedzy nasyłani przez twojego własnego brata?
Fantastyczna reinterpretacja baśni splątana magią warszawskich ulic.

”NAWET POTWORY CZASEM CZUJĄ SIĘ SAMOTNE” Wilcza Jagoda powraca, aby rozwiązać kolejne tajemnice! Z każdą nową przygodą Wilczej Jagody Magdalena Kubasiewicz konsekwentnie buduje swój wielowątkowy, fascynujący świat — równie miejski co baśniowy, pełen zarówno magii, jak i całkiem realnych ludzkich tajemnic i zatargów. A te, jak powszechnie wiadomo, potrafią być groźniejsze w skutkach niż niejedna klątwa. Zachowajcie ostrożność w trakcie lektury, bo w takim świecie aż chciałoby się zagubić… Marta Kisiel

Magdalena Kubasiewicz Absolwentka Uniwersytetu Jagiellońskiego. Autorka książek fantastycznych i kryminałów. Należy do Hardej Hordy, grupy zrzeszającej kilkanaście pisarek fantastyki. W 2021 roku nominowana do Nagrody im. Janusza A. Zajdla za opowiadanie Sen nocy miejskiej (z antologii Harde Baśnie), którego akcja dzieje się w uniwersum Przysługi dla Czarnoksiężnika. W lutym 2022 roku nakładem Wydawnictwa SQN została wydana pierwsza powieść opisująca przygody Wilczej Jagody.', 3, 2022, 368, 1);
INSERT INTO "public"."book_metadata" VALUES (2, '9788380495029', 'Zombie', 'Adam Górnik – młody błyskotliwy prokurator. Kochający mąż i troskliwy ojciec. Wzorowy obywatel. Jeden z najmłodszych zabójców w Polsce. Kiedy miał piętnaście lat, zamordował szkolnego kolegę, chuligana i postrach innych uczniów, Filipa „Korsarza” Korsarskiego, uderzając go młotkiem w głowę.

Wiele lat później dostaje wezwanie; jest przekonany, że wreszcie odkryto zwłoki jego ofiary. Teraz będzie mógł poprowadzić śledztwo we własnej sprawie i ostatecznie zatuszować zbrodnię. Jednak na miejscu znajduje ciało zabitej parę dni wcześniej dziewczynki. Szczątki Korsarza zniknęły. Czyżby wrócił zza grobu, żeby się zemścić?

Zaczyna się gra z zabójcą, którego okrucieństwo przekracza ludzką wyobraźnię. Górnik musi rozwiązać zagadkę potwora z przeszłości, odnaleźć go i powstrzymać. Wynajmuje detektywa Dawida Wolskiego, znanego z niekonwencjonalnych metod działania i wątpliwej etyki zawodowej.

„Zombie” to najmroczniejszy polski kryminał ostatnich lat. Nic nie jest tu czarno-białe, wir przemocy wciąga winnych i niewinnych, z pokolenia na pokolenie, a wśród kłamstw i ułudy trudno odróżnić prawdę od fałszu i wrogów od przyjaciół. Przetrwają tylko najsilniejsi i najbardziej bezwzględni…', 4, 2022, 520, 2);
INSERT INTO "public"."book_metadata" VALUES (3, '9788380491786', 'Wampir', 'Mateusz nie miał powodu pragnąć śmierci. Był zwykłym dwudziestolatkiem. Studiował socjologię, ale planował przenieść się na informatykę. Chciał podróżować, zwiedzić świat. Pewnej majowej nocy wszedł na dach wieżowca i skoczył. Nie zostawił listu. Nikt niczego nie widział. Prokuratura uznała, że to samobójstwo.

Wynajęty przez matkę krnąbrny prywatny detektyw Dawid Wolski rozpoczyna śledztwo i wchodzi w zaskakująco bezwzględny świat nastolatków. Sprawa komplikuje się coraz bardziej, kiedy tajemnice gliwickich zaułków zaczynają splatać się z wirtualną rzeczywistością. Jakie sekrety skrywał Mateusz? Dlaczego niektórzy członkowie jego rodziny najwyraźniej woleliby ukręcić łeb śledztwu? I czy zawsze warto znać prawdę? Ta wciągająca i pełna zaskakujących zwrotów akcji powieść otwiera gliwicki cykl kryminałów Chmielarza.', 4, 2015, 328, 2);
INSERT INTO "public"."book_metadata" VALUES (7, '9788365973375', 'Żmijowisko', 'Mistrzowski thriller Wojciecha Chmielarza.

Ostatnie wspólne wakacje... Tragedia, która niszczy. Czas, który nie przynosi pocieszenia. Koniec, od którego nie ma ucieczki.

Grupa trzydziestolatków, przyjaciół ze studiów, co roku wyjeżdża wspólnie ze swoimi rodzinami na wakacje. Tym razem trafiają do zagubionej wśród jezior i lasów agroturystyki
w niewielkiej wsi Żmijowisko. Bawią się jak zwykle – odreagowując stres szybkiego wielkomiejskiego życia. Jest alkohol, są narkotyki. A także skrywane od lat urazy, dawne uczucia i wzajemne pretensje.

Podczas jednej z mocno zakrapianych imprez ktoś kogoś prawie topi. Wywiązuje się kłótnia, podczas której otwierają się dawne rany. Następnego dnia córka jednej z par, piętnastoletnia Ada, znika. Pomimo poszukiwań nikomu nie udaje się jej odnaleźć. Rozpływa się
w powietrzu.

Rok później jej ojciec wraca do Żmijowiska, by podjąć ostatnią próbę odnalezienia córki.

„Ada była ciągle najważniejsza. Każdego dnia o niej myślałem, każdego. O tym, co się stało.
O tym, co moglibyśmy zrobić inaczej.”

Przez te dwanaście miesięcy znienawidziła go cała Polska. Ale – jak się okazuje – nie wraca tam sam…

Żmijowisko to opowieść o tragedii, która niszczy. O rodzinie, która musi stawić czoło próbie przekraczającej ludzkie wyobrażenia. Uczuciach, które trwają pomimo mijających lat i nie niosą pocieszenia. Zdradzie, bólu i miłości. Strachu, zbrodni i karze. O tym, ile jesteśmy
w stanie zrobić dla naszych dzieci i jak wiele nas to kosztuje.', 1, 2021, 480, 2);
INSERT INTO "public"."book_metadata" VALUES (11, '1231231231211', 'Abcd', 'asaasaasaasaasaasaasaasaasaasaasaasaasaasaasaasaasa', 2, 1212, 123, 1);
INSERT INTO "public"."book_metadata" VALUES (12, '9788375796537', 'Jedna rzecz. Zaskakujący mechanizm niezwykłych osiągnięć', 'Chcesz więcej! Więcej pieniędzy, czasu i satysfakcji z życia.

A zarazem chcesz mniej! Mniej pracy, obowiązków i stresu.

Autorzy z list bestsellerów „New York Timesa” – Gary Keller i Jay Papasan – uczą, w jaki sposób koncepcja JEDNEJ rzeczy może całkowicie zmienić podejście do każdej dziedziny życia, wpłynąć na dokonywane wybory i odnoszone rezultaty.

Czasami twoja JEDNA rzecz będzie pierwszą rzeczą na liście. Czasami – jedyną.

Ale zawsze to właśnie ona przyniesie niezwykłe efekty.

Jaka jest twoja JEDNA rzecz?

W obliczu niepewności, nieprzewidywalności i turbulencji współczesnego świata najtęższe głowy sięgają w życiu i w biznesie po modele oraz strategie, które łączą całościowe i procesowe podejście do rzeczywistości (complexity) z poszukiwaniem prostych i trafnych rozwiązań złożonych problemów (simplicity). W ten sposób rozwija się nowa filozofia, język szkoły życia (simplexity), do której należy ta książka. Jest po prostu świetna. Wprowadzamy ją na listę lektur Akademii Psychologii Przywództwa Szkoły Biznesu Politechniki Warszawskiej i Values.

Jacek Santorski, konsultant, dyrektor Akademii i co-chairman Values

Moda na minimalizm trwa. Gary Keller i Jay Papasan, autorzy Jednej rzeczy idą jednak o krok dalej. Zamiast przekonywać nas do pozbywania się kolejnych rzeczy z szaf i kredensów, proponują prawdziwą rewolucję w myśleniu. Sukces polega na robieniu wszystkiego, co właściwe, a nie na robieniu właściwie wszystkiego – piszą. Proponują skupienie się na jednej najważniejszej rzeczy, zamiast wykonywania kilku naraz. Jak jednak wybrać tę jedną jedyną rzecz? O tym też piszą. Przede wszystkim jednak rozgrzeszają tych, którzy nie potrafią i nie chcą być w kilku miejscach w tym samym czasie i łapać kilku srok za ogon! Wielozadaniowość jest passé! Pora w to uwierzyć.

Joanna Olekszyk, „Sens”', 5, 2013, 238, 3);

-- ----------------------------
-- Table structure for book_metadata_authors
-- ----------------------------
DROP TABLE IF EXISTS "public"."book_metadata_authors";
CREATE TABLE "public"."book_metadata_authors" (
  "id" int4 NOT NULL DEFAULT nextval('book_metadata_authors_id_seq'::regclass),
  "metadataId" int4 NOT NULL,
  "authorId" int4 NOT NULL
)
;

-- ----------------------------
-- Records of book_metadata_authors
-- ----------------------------
INSERT INTO "public"."book_metadata_authors" VALUES (1, 1, 1);
INSERT INTO "public"."book_metadata_authors" VALUES (2, 2, 2);
INSERT INTO "public"."book_metadata_authors" VALUES (3, 3, 2);
INSERT INTO "public"."book_metadata_authors" VALUES (4, 7, 2);
INSERT INTO "public"."book_metadata_authors" VALUES (7, 11, 1);
INSERT INTO "public"."book_metadata_authors" VALUES (8, 12, 3);
INSERT INTO "public"."book_metadata_authors" VALUES (9, 12, 4);

-- ----------------------------
-- Table structure for book_publisher
-- ----------------------------
DROP TABLE IF EXISTS "public"."book_publisher";
CREATE TABLE "public"."book_publisher" (
  "id" int4 NOT NULL DEFAULT nextval('book_publisher_id_seq'::regclass),
  "name" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of book_publisher
-- ----------------------------
INSERT INTO "public"."book_publisher" VALUES (1, 'Wycisk K.');
INSERT INTO "public"."book_publisher" VALUES (2, 'HM');
INSERT INTO "public"."book_publisher" VALUES (3, 'Sine Qua Non');
INSERT INTO "public"."book_publisher" VALUES (4, 'Czarne');
INSERT INTO "public"."book_publisher" VALUES (5, 'Galaktyka');

-- ----------------------------
-- Table structure for book_types
-- ----------------------------
DROP TABLE IF EXISTS "public"."book_types";
CREATE TABLE "public"."book_types" (
  "id" int4 NOT NULL DEFAULT nextval('book_types_id_seq'::regclass),
  "name" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of book_types
-- ----------------------------
INSERT INTO "public"."book_types" VALUES (2, 'Kryminał');
INSERT INTO "public"."book_types" VALUES (1, 'Fantastyka i sci-fi');
INSERT INTO "public"."book_types" VALUES (3, 'Biznes');

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS "public"."books";
CREATE TABLE "public"."books" (
  "id" int4 NOT NULL DEFAULT nextval('books_id_seq'::regclass),
  "metadataId" int4 NOT NULL
)
;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO "public"."books" VALUES (3, 1);
INSERT INTO "public"."books" VALUES (5, 2);
INSERT INTO "public"."books" VALUES (6, 2);
INSERT INTO "public"."books" VALUES (7, 3);
INSERT INTO "public"."books" VALUES (9, 3);
INSERT INTO "public"."books" VALUES (21, 1);
INSERT INTO "public"."books" VALUES (22, 1);
INSERT INTO "public"."books" VALUES (26, 3);
INSERT INTO "public"."books" VALUES (27, 7);
INSERT INTO "public"."books" VALUES (28, 11);
INSERT INTO "public"."books" VALUES (29, 12);
INSERT INTO "public"."books" VALUES (30, 12);

-- ----------------------------
-- Table structure for borrows
-- ----------------------------
DROP TABLE IF EXISTS "public"."borrows";
CREATE TABLE "public"."borrows" (
  "id" int4 NOT NULL DEFAULT nextval('borrows_id_seq'::regclass),
  "borrowerId" int4,
  "lenderId" int4,
  "bookId" int4 NOT NULL,
  "borrowedOn" timestamptz(6) NOT NULL DEFAULT now(),
  "returnOn" timestamptz(6) NOT NULL,
  "returnedOn" timestamptz(6)
)
;

-- ----------------------------
-- Records of borrows
-- ----------------------------
INSERT INTO "public"."borrows" VALUES (3, 3, 1, 3, '2022-06-25 18:41:38.41+00', '2022-06-25 18:41:53.503+00', '2022-06-28 19:34:15.226+00');
INSERT INTO "public"."borrows" VALUES (4, 4, 1, 3, '2022-06-30 17:22:20.136+00', '2022-07-30 17:22:29.886+00', '2022-06-26 16:50:49.338382+00');
INSERT INTO "public"."borrows" VALUES (9, 5, 1, 9, '2022-06-26 16:50:59.297459+00', '2022-07-27 03:20:02+00', NULL);
INSERT INTO "public"."borrows" VALUES (10, 4, 1, 5, '2022-06-26 20:52:55.874897+00', '2022-07-27 07:21:58+00', NULL);
INSERT INTO "public"."borrows" VALUES (11, 4, 1, 22, '2022-06-26 21:08:31.633872+00', '2022-07-27 07:37:34+00', '2022-06-26 21:08:34.290566+00');
INSERT INTO "public"."borrows" VALUES (12, 3, 1, 28, '2022-06-26 21:10:00.729682+00', '2022-07-27 07:39:03+00', '2022-06-26 21:10:11.613896+00');
INSERT INTO "public"."borrows" VALUES (13, 3, 1, 6, '2022-06-26 21:15:23.013+00', '2022-06-26 07:44:26+00', NULL);
INSERT INTO "public"."borrows" VALUES (14, 5, 1, 29, '2022-06-26 21:20:53.307432+00', '2022-07-27 07:49:56+00', NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."roles";
CREATE TABLE "public"."roles" (
  "id" int4 NOT NULL DEFAULT nextval('"Roles_id_seq"'::regclass),
  "name" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO "public"."roles" VALUES (1, 'books_view');
INSERT INTO "public"."roles" VALUES (2, 'books_create');
INSERT INTO "public"."roles" VALUES (3, 'authors_view');
INSERT INTO "public"."roles" VALUES (4, 'publishers_view');
INSERT INTO "public"."roles" VALUES (5, 'types_view');
INSERT INTO "public"."roles" VALUES (6, 'books_delete');
INSERT INTO "public"."roles" VALUES (7, 'borrows_view');
INSERT INTO "public"."roles" VALUES (8, 'borrows_create');
INSERT INTO "public"."roles" VALUES (9, 'users_view');
INSERT INTO "public"."roles" VALUES (10, 'users_role');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS "public"."sessions";
CREATE TABLE "public"."sessions" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "sid" varchar COLLATE "pg_catalog"."default" NOT NULL,
  "uid" int4 NOT NULL,
  "validto" timestamptz(6) NOT NULL,
  "active" bool NOT NULL DEFAULT false
)
;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (56, 'ff49bc5a3d80143ac0ec6efb21aa84d0', 1, '2022-06-19 19:59:44+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (59, '7be1f760ffba50a481970e2f716762c2', 1, '2022-06-19 20:23:01+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (123, '8f684f1629c58a85ffd0edd76f947b03', 1, '2022-06-25 12:29:16+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (121, '44367d876f99b9d59cb11b0b12250ab6', 1, '2022-06-21 23:06:26+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (109, 'facb0c7c328d2400f2256d72b6ff1a7c', 1, '2022-06-21 21:08:20+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (110, 'ce9c805a55e967add06154b65bec1a7b', 1, '2022-06-21 21:37:53+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (53, 'ecdd78abdf103abb63f31df1f8d06b8f', 1, '2022-06-19 00:06:46+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (69, '8d600e83386be672b32d01999ff48815', 1, '2022-06-19 23:47:59+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (128, 'e808d6953e184450d5e3ce3584c477b8', 1, '2022-06-25 15:43:39+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (39, 'b49cd12aee91880a9fa69ad4233066ab', 1, '2022-05-29 10:09:33+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (63, 'e8d64717e2eb5ac7b1371e84d37f3b83', 1, '2022-06-19 22:52:53+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (40, '45a40308e9526dff61722c3329ed5cd3', 1, '2022-05-29 10:09:43+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (41, '5c47af62a6d0fd588dcb7455830021d9', 1, '2022-05-29 15:07:24+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (122, '5d2cc6ddf202d2686beda143822487d8', 1, '2022-06-21 23:49:21+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (42, '431206c918fb197d01364e0ce7c1bf11', 1, '2022-05-29 10:37:37+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (111, '099a25c283f8e888836e61be25592950', 1, '2022-06-21 21:37:56+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (54, '2f906becb9e72fd52d7142944ab7ccad', 1, '2022-06-19 16:48:18+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (43, 'a86c49e6c069dc4ee0a08a564d5efa23', 1, '2022-05-29 10:11:03+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (44, '6f19ac2fb6c2c31a57c25c5f0ebfc341', 1, '2022-05-29 10:11:21+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (45, '3dd3680e443adab673457c25bbc0b39f', 1, '2022-05-29 10:16:08+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (46, '95bdb84f7d32864e30b020d83c1a0561', 1, '2022-05-29 10:20:43+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (47, '79921b8322f6fcc51d854499a48c7da0', 1, '2022-05-29 10:52:00+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (57, '6ef7e4c227e2f6e87eb2d108c948a2f8', 1, '2022-06-19 20:13:38+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (48, '3e046552b32330439b795bb2eca57470', 1, '2022-05-29 10:56:46+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (49, '30c302a25d08dfe9c70937a19aefc433', 1, '2022-06-18 19:38:02+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (50, '94ecb1760c0ddf5f89d405113a95c34c', 1, '2022-06-18 23:56:10+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (51, 'e0bae9c7b084e6b017e3d07376fb6d56', 1, '2022-06-18 23:56:15+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (52, '89fd8667953c7e607c2c5c43a374ea69', 1, '2022-06-18 23:59:52+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (62, '30e7ad81634bf27be069359d6c79f1c0', 1, '2022-06-19 20:50:15+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (120, 'd7e54b29b9c57198e3f65dc43da85ea4', 1, '2022-06-21 23:01:21+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (106, '31503fa46d57eb004a75ec1d8ac3be0f', 1, '2022-06-21 20:58:42+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (68, '004d9b06e1f4729fa5fe961326b74c66', 1, '2022-06-19 23:39:25+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (64, 'a63ef662f6b26635894b0c3ad97f3fc3', 1, '2022-06-19 23:01:46+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (60, 'b597c7904e81699875f2a5d44a4a0f61', 1, '2022-06-19 20:37:52+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (112, '81c40685030de257601d4d6909c9c6f0', 1, '2022-06-21 21:39:18+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (70, '5584aa0272a39986b8112e75cea2e62d', 1, '2022-06-19 23:57:15+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (105, 'e825d5077f2cc65f588da075cb2a2196', 1, '2022-06-21 20:45:12+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (65, '9e6ff373e9dcc5dfc4770f489f841430', 1, '2022-06-19 23:12:05+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (55, 'ad9554d5894a437b516eabda05342707', 1, '2022-06-19 17:01:12+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (58, 'c1d44a32d8a95bd78ba315944c996e48', 1, '2022-06-19 20:18:19+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (61, '686c70e5ea3ebc1a16776cfa0b1d5891', 1, '2022-06-19 20:44:42+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (114, '4c89c96bfe1733f42aee6a5f0153825c', 1, '2022-06-21 21:50:46+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (129, 'b4519c55d039bbaa5fe262b3c2244ab1', 1, '2022-06-25 15:59:48+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (66, '5e9fca7eece33aeb9a03ef588b762817', 1, '2022-06-19 23:35:54+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (67, '33dde5446ff1cfd9095b09f8f6cbe237', 1, '2022-06-19 23:36:15+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (133, '9db6022126e5fb90448c152984323e9a', 1, '2022-06-25 16:37:28+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (116, 'bb0553cc8e250a79f64e7a06a10eb7a6', 1, '2022-06-21 22:16:58+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (113, '32e4fa8663b93a6947cd824be835da7d', 1, '2022-06-21 21:41:00+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (104, '488930ace4f4baee0c996fc58d8ba92f', 1, '2022-06-21 20:43:54+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (71, 'a6358baa201a7183a3d4da66ded7f1d8', 1, '2022-06-20 00:00:33+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (134, '75c1edd77e1483e61046384b0820b5d1', 1, '2022-06-25 17:20:19+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (117, '50c24e6c6480964c5a8bda13d4082f7a', 1, '2022-06-21 22:30:05+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (108, '0113d594e09b0aa1a15a3cd6e0eab10a', 1, '2022-06-21 21:04:58+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (115, '0138900576ad8e335c9d189370af210a', 1, '2022-06-21 22:10:57+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (107, '4bfd1f8dbb975817b59a6cb6d2263c13', 1, '2022-06-21 20:58:57+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (142, '45aed625c293c3d97cf91f30915d2ac0', 1, '2022-06-26 16:17:29+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (118, 'ae3c4241d2eede222c73dfee66f4fa31', 1, '2022-06-21 22:34:43+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (126, 'efbf0df12e0b2866961b55f9b7169898', 1, '2022-06-25 14:48:53+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (119, 'f62dbef19aeea8e181436bee108b6425', 1, '2022-06-21 22:45:29+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (136, '5ea0ad249a47bf64d92acb24f1e5b9ee', 1, '2022-06-25 17:39:48+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (124, '38d99337ddd2d62bc30be0cb41bbcc20', 1, '2022-06-25 12:43:35+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (127, 'b768ea00db3ac847a97f06a66a1ea813', 1, '2022-06-25 15:41:50+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (130, '9777a98c8e78c537e0841a7ef92d7f3f', 1, '2022-06-25 16:06:11+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (125, '7ad2c33db056526082bf40daeb18c941', 1, '2022-06-25 14:14:13+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (138, '8bf688ed02b117aea944cf54d18bdf15', 1, '2022-06-26 14:38:11+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (132, '17fbd4b9619543d9fa6e4cadf3630f8f', 1, '2022-06-25 16:37:23+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (131, 'de6c7870b30bfa52cda398a010c68f8d', 1, '2022-06-25 16:24:47+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (135, '1c4ca657ee8018935e653ba6c0c2ec89', 1, '2022-06-25 17:24:05+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (141, '903b28b885a4bad6296eac6445e396b3', 1, '2022-06-26 16:04:25+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (140, '0b0181ff3b3b5a816dce4b85cf1c5e9e', 1, '2022-06-26 15:59:32+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (137, '86ff1b20d2d31c29f9d7822eb34a05db', 1, '2022-06-25 20:23:33+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (139, '143b00372485119864618d740ebca020', 1, '2022-06-26 15:19:14+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (143, '74613433b3230374e7156395b12955d6', 1, '2022-06-26 16:44:49+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (145, 'a3c0f65977256be312595ed505749247', 1, '2022-06-26 17:16:57+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (144, '5d626df6f969edcb9f5db17020905a21', 1, '2022-06-26 16:59:29+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (146, '4c9c78d5f3f528b2a1197edd522e30df', 1, '2022-06-26 17:26:15+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (147, 'b6604294a043afa5ee2ef6c7e4ecf3df', 1, '2022-06-26 19:04:10+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (148, '63d223210af05227f595cd3488a81c13', 1, '2022-06-26 19:12:19+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (149, '783eb2a32cfbc13b2022a5885b741ecd', 1, '2022-06-26 19:27:32+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (150, '8c8aab6f78dff3cd5895a6b89aa65181', 1, '2022-06-26 20:12:50+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (151, '4c10819e39c0705d1a1e562ad74a2adc', 1, '2022-06-26 20:23:21+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (152, '45a9e82d39db9903048a6459f16a427f', 1, '2022-06-26 20:39:12+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (153, '714bb161158c7611e5daa3f7a2c99b85', 1, '2022-06-26 20:42:20+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (154, '356ee3d5c1371b52e1c7b8fc1ea6dc98', 1, '2022-06-26 21:18:34+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (155, '56f0cf2576e598406d8cd7a10af17a3c', 1, '2022-06-26 21:21:46+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (157, '4a63068cac94b4e6788d24cb18b88d64', 1, '2022-06-26 21:36:07+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (158, '94f002744936e664f6fcc2b52efc31b6', 1, '2022-06-26 21:55:42+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (156, '16511446624dd5c03e1e573cb79429a9', 3, '2022-06-26 21:22:59+00', 'f');
INSERT INTO "public"."sessions" OVERRIDING SYSTEM VALUE VALUES (159, '984ba3b2269944d6bea4106f574ff36d', 1, '2022-06-26 22:16:39+00', 'f');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int4 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "email" varchar COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar COLLATE "pg_catalog"."default" NOT NULL,
  "name" varchar COLLATE "pg_catalog"."default" NOT NULL,
  "surname" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (4, 'leg@eg.pl', '$2y$10$paip123456789paip0paiekMIua5EUk7s7gKxRRyz1dQxhCItTHNu', 'Kazimierz', 'Wielki');
INSERT INTO "public"."users" VALUES (5, 'lag@agmail.pl', '$2y$10$paip123456789paip0paiekMIua5EUk7s7gKxRRyz1dQxhCItTHNu', 'Łukasz', 'Kara');
INSERT INTO "public"."users" VALUES (3, 'world@gmail.com', '$2y$10$paip123456789paip0paiekMIua5EUk7s7gKxRRyz1dQxhCItTHNu', 'Mateusz', 'Ożak');
INSERT INTO "public"."users" VALUES (1, 'admin@admin.com', '$2y$10$paip123456789paip0paiekMIua5EUk7s7gKxRRyz1dQxhCItTHNu', 'admin', 'admin');

-- ----------------------------
-- Table structure for users_roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."users_roles";
CREATE TABLE "public"."users_roles" (
  "id" int4 NOT NULL DEFAULT nextval('users_roles_id_seq'::regclass),
  "uid" int4 NOT NULL,
  "rid" int4 NOT NULL
)
;

-- ----------------------------
-- Records of users_roles
-- ----------------------------
INSERT INTO "public"."users_roles" VALUES (1, 1, 1);
INSERT INTO "public"."users_roles" VALUES (2, 1, 2);
INSERT INTO "public"."users_roles" VALUES (3, 1, 3);
INSERT INTO "public"."users_roles" VALUES (4, 1, 4);
INSERT INTO "public"."users_roles" VALUES (5, 1, 5);
INSERT INTO "public"."users_roles" VALUES (6, 1, 6);
INSERT INTO "public"."users_roles" VALUES (7, 1, 7);
INSERT INTO "public"."users_roles" VALUES (8, 1, 8);
INSERT INTO "public"."users_roles" VALUES (9, 1, 9);
INSERT INTO "public"."users_roles" VALUES (10, 1, 10);
INSERT INTO "public"."users_roles" VALUES (12, 3, 1);
INSERT INTO "public"."users_roles" VALUES (13, 4, 1);
INSERT INTO "public"."users_roles" VALUES (14, 5, 1);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."Roles_id_seq"
OWNED BY "public"."roles"."id";
SELECT setval('"public"."Roles_id_seq"', 10, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."book_authors_id_seq"
OWNED BY "public"."book_authors"."id";
SELECT setval('"public"."book_authors_id_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."book_metadata_authors_id_seq"
OWNED BY "public"."book_metadata_authors"."id";
SELECT setval('"public"."book_metadata_authors_id_seq"', 9, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."book_metadata_id_seq"
OWNED BY "public"."book_metadata"."id";
SELECT setval('"public"."book_metadata_id_seq"', 12, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."book_publisher_id_seq"
OWNED BY "public"."book_publisher"."id";
SELECT setval('"public"."book_publisher_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."book_types_id_seq"
OWNED BY "public"."book_types"."id";
SELECT setval('"public"."book_types_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."books_id_seq"
OWNED BY "public"."books"."id";
SELECT setval('"public"."books_id_seq"', 30, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."borrows_id_seq"
OWNED BY "public"."borrows"."id";
SELECT setval('"public"."borrows_id_seq"', 14, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."sessions_id_seq"
OWNED BY "public"."sessions"."id";
SELECT setval('"public"."sessions_id_seq"', 159, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_roles_id_seq"
OWNED BY "public"."users_roles"."id";
SELECT setval('"public"."users_roles_id_seq"', 14, true);

-- ----------------------------
-- Indexes structure for table book_authors
-- ----------------------------
CREATE UNIQUE INDEX "book_authors_fullname_uindex" ON "public"."book_authors" USING btree (
  "fullname" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "book_authors_id_uindex" ON "public"."book_authors" USING btree (
  "id" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table book_authors
-- ----------------------------
ALTER TABLE "public"."book_authors" ADD CONSTRAINT "book_authors_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table book_metadata
-- ----------------------------
CREATE UNIQUE INDEX "book_metadata_id_uindex" ON "public"."book_metadata" USING btree (
  "id" "pg_catalog"."int4_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "book_metadata_isbn_uindex" ON "public"."book_metadata" USING btree (
  "isbn" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table book_metadata
-- ----------------------------
ALTER TABLE "public"."book_metadata" ADD CONSTRAINT "book_metadata_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table book_metadata_authors
-- ----------------------------
CREATE UNIQUE INDEX "book_metadata_authors_id_uindex" ON "public"."book_metadata_authors" USING btree (
  "id" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table book_metadata_authors
-- ----------------------------
ALTER TABLE "public"."book_metadata_authors" ADD CONSTRAINT "book_metadata_authors_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table book_publisher
-- ----------------------------
CREATE UNIQUE INDEX "book_publisher_id_uindex" ON "public"."book_publisher" USING btree (
  "id" "pg_catalog"."int4_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "book_publisher_name_uindex" ON "public"."book_publisher" USING btree (
  "name" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table book_publisher
-- ----------------------------
ALTER TABLE "public"."book_publisher" ADD CONSTRAINT "book_publisher_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table book_types
-- ----------------------------
CREATE UNIQUE INDEX "book_types_id_uindex" ON "public"."book_types" USING btree (
  "id" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table book_types
-- ----------------------------
ALTER TABLE "public"."book_types" ADD CONSTRAINT "book_types_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table books
-- ----------------------------
CREATE UNIQUE INDEX "books_id_uindex" ON "public"."books" USING btree (
  "id" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table books
-- ----------------------------
ALTER TABLE "public"."books" ADD CONSTRAINT "books_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table borrows
-- ----------------------------
CREATE UNIQUE INDEX "borrows_id_uindex" ON "public"."borrows" USING btree (
  "id" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table borrows
-- ----------------------------
ALTER TABLE "public"."borrows" ADD CONSTRAINT "borrows_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table roles
-- ----------------------------
CREATE UNIQUE INDEX "roles_id_uindex" ON "public"."roles" USING btree (
  "id" "pg_catalog"."int4_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "roles_name_uindex" ON "public"."roles" USING btree (
  "name" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table roles
-- ----------------------------
ALTER TABLE "public"."roles" ADD CONSTRAINT "roles_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Auto increment value for sessions
-- ----------------------------
SELECT setval('"public"."sessions_id_seq"', 159, true);

-- ----------------------------
-- Primary Key structure for table sessions
-- ----------------------------
ALTER TABLE "public"."sessions" ADD CONSTRAINT "sessions_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table users
-- ----------------------------
CREATE UNIQUE INDEX "users_email_uindex" ON "public"."users" USING btree (
  "email" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "users_id_uindex" ON "public"."users" USING btree (
  "id" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table users_roles
-- ----------------------------
CREATE UNIQUE INDEX "users_roles_id_uindex" ON "public"."users_roles" USING btree (
  "id" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table users_roles
-- ----------------------------
ALTER TABLE "public"."users_roles" ADD CONSTRAINT "users_roles_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table book_metadata
-- ----------------------------
ALTER TABLE "public"."book_metadata" ADD CONSTRAINT "book_metadata_book_publisher_id_fk" FOREIGN KEY ("publisherId") REFERENCES "public"."book_publisher" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."book_metadata" ADD CONSTRAINT "book_metadata_book_types_id_fk" FOREIGN KEY ("typeId") REFERENCES "public"."book_types" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table book_metadata_authors
-- ----------------------------
ALTER TABLE "public"."book_metadata_authors" ADD CONSTRAINT "book_metadata_authors_book_authors_id_fk" FOREIGN KEY ("authorId") REFERENCES "public"."book_authors" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."book_metadata_authors" ADD CONSTRAINT "book_metadata_authors_book_metadata_id_fk" FOREIGN KEY ("metadataId") REFERENCES "public"."book_metadata" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table books
-- ----------------------------
ALTER TABLE "public"."books" ADD CONSTRAINT "books_book_metadata_id_fk" FOREIGN KEY ("metadataId") REFERENCES "public"."book_metadata" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table borrows
-- ----------------------------
ALTER TABLE "public"."borrows" ADD CONSTRAINT "borrows_books_id_fk" FOREIGN KEY ("bookId") REFERENCES "public"."books" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."borrows" ADD CONSTRAINT "borrows_users_id_fk" FOREIGN KEY ("borrowerId") REFERENCES "public"."users" ("id") ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE "public"."borrows" ADD CONSTRAINT "borrows_users_id_fk_2" FOREIGN KEY ("lenderId") REFERENCES "public"."users" ("id") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table sessions
-- ----------------------------
ALTER TABLE "public"."sessions" ADD CONSTRAINT "uid_fk" FOREIGN KEY ("uid") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table users_roles
-- ----------------------------
ALTER TABLE "public"."users_roles" ADD CONSTRAINT "users_roles_roleId__fk" FOREIGN KEY ("rid") REFERENCES "public"."roles" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."users_roles" ADD CONSTRAINT "users_roles_userId__fk" FOREIGN KEY ("uid") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
