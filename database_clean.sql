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
-- Table structure for book_publisher
-- ----------------------------
DROP TABLE IF EXISTS "public"."book_publisher";
CREATE TABLE "public"."book_publisher" (
  "id" int4 NOT NULL DEFAULT nextval('book_publisher_id_seq'::regclass),
  "name" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;

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
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS "public"."books";
CREATE TABLE "public"."books" (
  "id" int4 NOT NULL DEFAULT nextval('books_id_seq'::regclass),
  "metadataId" int4 NOT NULL
)
;

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
SELECT setval('"public"."book_authors_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."book_metadata_authors_id_seq"
OWNED BY "public"."book_metadata_authors"."id";
SELECT setval('"public"."book_metadata_authors_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."book_metadata_id_seq"
OWNED BY "public"."book_metadata"."id";
SELECT setval('"public"."book_metadata_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."book_publisher_id_seq"
OWNED BY "public"."book_publisher"."id";
SELECT setval('"public"."book_publisher_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."book_types_id_seq"
OWNED BY "public"."book_types"."id";
SELECT setval('"public"."book_types_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."books_id_seq"
OWNED BY "public"."books"."id";
SELECT setval('"public"."books_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."borrows_id_seq"
OWNED BY "public"."borrows"."id";
SELECT setval('"public"."borrows_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."sessions_id_seq"
OWNED BY "public"."sessions"."id";
SELECT setval('"public"."sessions_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_roles_id_seq"
OWNED BY "public"."users_roles"."id";
SELECT setval('"public"."users_roles_id_seq"', 11, true);

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
