--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5 (Debian 10.5-2.pgdg90+1)
-- Dumped by pg_dump version 10.5 (Debian 10.5-2.pgdg90+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: comments; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.comments (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    profile_id bigint NOT NULL,
    message text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: comments_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.comments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: comments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.comments_id_seq OWNED BY public.comments.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: messages; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.messages (
    id integer NOT NULL,
    thread_id integer NOT NULL,
    user_id integer NOT NULL,
    body text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


--
-- Name: messages_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.messages_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: messages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.messages_id_seq OWNED BY public.messages.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: participants; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.participants (
    id integer NOT NULL,
    thread_id integer NOT NULL,
    user_id integer NOT NULL,
    last_read timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


--
-- Name: participants_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.participants_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: participants_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.participants_id_seq OWNED BY public.participants.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


--
-- Name: profiles; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.profiles (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    profile_title character varying(255),
    plz character varying(5),
    location character varying(255),
    profile_description text,
    latitude numeric(10,7),
    longitude numeric(10,7),
    is_host boolean DEFAULT false NOT NULL,
    length_of_stay integer,
    offer_as_host json,
    accommodation_description text,
    image character varying(255),
    accommodation_type character varying(255),
    own_room boolean,
    pets character varying(255),
    accessibility character varying(255),
    number_of_persons integer,
    professional_offer character varying(255),
    accepts_smoker character varying(255),
    professional_description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: profiles_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.profiles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: profiles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.profiles_id_seq OWNED BY public.profiles.id;


--
-- Name: threads; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.threads (
    id integer NOT NULL,
    subject character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


--
-- Name: threads_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.threads_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: threads_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.threads_id_seq OWNED BY public.threads.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    firstname character varying(255) NOT NULL,
    lastname character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: comments id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.comments ALTER COLUMN id SET DEFAULT nextval('public.comments_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: messages id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.messages ALTER COLUMN id SET DEFAULT nextval('public.messages_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: participants id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.participants ALTER COLUMN id SET DEFAULT nextval('public.participants_id_seq'::regclass);


--
-- Name: profiles id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.profiles ALTER COLUMN id SET DEFAULT nextval('public.profiles_id_seq'::regclass);


--
-- Name: threads id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.threads ALTER COLUMN id SET DEFAULT nextval('public.threads_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: comments; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.comments (id, user_id, profile_id, message, created_at, updated_at) FROM stdin;
1	1	3	NCOG5I7FFR5VMzGqF5VJUIFFZygnI0S0aAIsaJ6leUZRHGBBClbGiiC7KUunLJgyryXeaTL6WEZe1X7uKdcNdKYdWcBTUvR9IYx6	2021-11-03 18:41:33	2021-11-03 18:41:33
2	1	2	CUhfHUH1YuLagpLHQolEJkzRurZmBgSPlxAXHHpP9BGf2OO4WZU5tfJoN6JsY7moH9J4Jgi80XITKZAV2OiO5x0ADgP5ky8tAYJ2	2021-11-03 18:42:22	2021-11-03 18:42:22
3	3	2	QTXRX19kxStonlE0NP0UzjDR8l4NupFKaLVCWijXcMoGXHQGKmULuZhZ5B0dAj8R8sDcFnuJG3oalqn4GgLUomFAVq3mOj1NXa77	2021-11-03 18:42:32	2021-11-03 18:42:32
4	3	1	lmTjIrCwkciO9id2Tls5DTW37sz4e7j8VCZjoYoGUVUwu30nwR8u4yxej80YImHXSIWEk1rwrtEPJtaomG3hZu2qdDgpBXAVWFZJ	2021-11-03 18:43:10	2021-11-03 18:43:10
5	2	1	FXKtUIajOYHOGXTjTEPxGUG3HrJ8n3uQc3FbOsYktfU3zLQjBFxji46xnkB6DaPcxOm9SI7hyJFVCzMz2dtWJPd1eazew3VXmon9	2021-11-03 18:47:11	2021-11-03 18:47:11
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: messages; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.messages (id, thread_id, user_id, body, created_at, updated_at, deleted_at) FROM stdin;
1	1	1	Hallo Gerda, \r\nSchöne Grüße\r\nClaus-Dieter	2021-11-03 18:52:42	2021-11-03 18:52:42	\N
2	2	1	Hallo Josefine, \r\nSchöne Grüße\r\nClaus-Dieter	2021-11-03 18:53:13	2021-11-03 18:53:13	\N
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2014_10_28_175635_create_threads_table	1
4	2014_10_28_175710_create_messages_table	1
5	2014_10_28_180224_create_participants_table	1
6	2014_11_03_154831_add_soft_deletes_to_participants_table	1
7	2014_12_04_124531_add_softdeletes_to_threads_table	1
8	2017_03_30_152742_add_soft_deletes_to_messages_table	1
9	2019_08_19_000000_create_failed_jobs_table	1
10	2020_11_06_212237_create_profiles_table	1
11	2021_01_02_162107_create_comments_table	1
\.


--
-- Data for Name: participants; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.participants (id, thread_id, user_id, last_read, created_at, updated_at, deleted_at) FROM stdin;
2	1	2	\N	2021-11-03 18:52:42	2021-11-03 18:52:42	\N
1	1	1	2021-11-03 18:52:50	2021-11-03 18:52:42	2021-11-03 18:52:50	\N
3	2	1	2021-11-03 18:53:13	2021-11-03 18:53:13	2021-11-03 18:53:13	\N
4	2	3	\N	2021-11-03 18:53:13	2021-11-03 18:53:13	\N
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: profiles; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.profiles (id, user_id, profile_title, plz, location, profile_description, latitude, longitude, is_host, length_of_stay, offer_as_host, accommodation_description, image, accommodation_type, own_room, pets, accessibility, number_of_persons, professional_offer, accepts_smoker, professional_description, created_at, updated_at) FROM stdin;
2	2	Liebe. Ein junges Herz hängt ganz an mich gewöhnt, sie kriegen Zucker, wenn.	38533	Aachen	Frau sei damit ausgekommen". Ich redete mit Lotten dulde. Ich sehe dieses Elendes kein Ende als das letztemal, da sie ihn anzubringen weiß, oft zur Zeit, wo ich mir das durch.	53.8178645	7.5888024	t	5	"Contret\\u00e4nze den Garten auf einem der H\\u00fcgel anzulegen, die mit ihren ausgebreiteten \\u00c4sten den kleinen Platz vor der Kirche bedecken, der ringsum mit Bauerh\\u00e4usern, Scheunen und."	Wort hasse ich auf die Kinder frühzeitig bewahren müsse.—nun fiel mir ein, daß der himmlische Atem ihres Mundes meine Lippen erreichen kann:—ich glaube zu versinken, wie vom.	\N		f			7		\N	Kinder. Eine traurige Bemerkung hab' ich nicht umhin konnte, die schönen Nußbäume zu loben, die uns so oft verlangt, um mich her keimen und quellen sah; wenn ich dann im hohen.	2021-10-15 20:45:36	2021-10-15 20:45:36
4	4	Tulpenbeete und Krautfelder zugrunde gehen würde! Daß ich mich oft und denke.	36991	Rastatt	Abend geboren wurde. Er war mein Vorfahr im Amt, und wie sie mich nie wieder sehen wird. Ich habe heute eine Szene gehabt, die, rein abgeschrieben, die schönste Idylle von der.	53.6553724	13.2029763	t	9	"Kein Wort von der Welt bin!\\u2014Wilhelm, es ist mit der Tr\\u00e4gheit, denn es ist mit der Zukunft! Ein gro\\u00dfes d\\u00e4mmerndes Ganze ruht vor unserer Seele, unsere Empfindung verschwimmt darin."	Selbstmord, wovon jetzt die Rede ist, mit großen Handlungen vergleichst: da man es doch für nichts anders als eine Schwäche halten kann. Denn freilich ist es leichter zu sterben.	\N		t			2		\N	Tagen traf ich einen jungen V. an, einen offnen Jungen, mit einer Nachbarin zu verplaudern—deren feurige Natur fühlt nun endlich innigere Bedürfnisse, die durch die Augen ihres.	2021-10-15 20:45:36	2021-10-15 20:45:36
5	5	Mensch wäre, unter den wonnevollsten Tränen. Und sah nach ihrem Auge.	78552	Korbach	Frauenzimmer ausbrechen sah. Die klügste setzte sich in ein Kollegium zu setzen; nur mit seiner Liebe ist's am Ende und, wenn er der beste, der edelste Mensch wäre, unter den ich.	48.9509959	14.8235919	t	2	"Magd, die ans Tor kam, bat uns, einen Augenblick zu verziehen, Mamsell Lottchen w\\u00fcrde gleich kommen. Ich ging durch den Garten herkam: sie bewillkommte Lotten mit herzlicher."	Entfernung so von der Prinzessin, die von uns wissen", fuhr sie fort, "eine der Furchtsamsten, und indem sie dem Bedienten, sie zu machen hatte, machte auch keine—das heißt.	\N		f			2		\N	Tage mit Fratzen verderben und nur erst zu spät das Unersetzliche ihrer Verschwendung einsehen. Mich wurmte das, und ich nicht mehr; das weiß ich, daß ich bald merken konnte, er.	2021-10-15 20:45:36	2021-10-15 20:45:36
6	6	Reinheit nicht gedacht und geträumt. Schelte mich nicht, wenn ich sie mit.	75332	Ratingen	Wahnsinnige ausschreiten mußte. Aber auch im gemeinen Leben ist's unerträglich, fast einem jeden bei halbweg einer freien, edlen, unerwarteten Tat nachrufen zu hören: ' der.	50.0616304	9.0619471	t	2	"Anla\\u00df eines Gez\\u00e4nkes, einer \\u00fcbeln Nachrede mit einer gar gl\\u00fccklichen Gesichtsbildung. Er kommt erst von Akademien d\\u00fcnkt sich eben nicht weise, aber glaubt doch, er wisse mehr als."	Die Geschichte war nicht lange sitzen; ich stand auf, trat näher hin und pflücke Blumen am Wege, füge sie sehr sorgfältig in einen Husten verfiel, der unsern Diskurs eine.	\N		t			6		\N	Malerei sagte, gilt gewiß auch von der Stadt hinaus zum Amtmann und fand nach Verlauf einer Stunde, daß ich nicht vor ihr das ganze Tal. Eine gute Wirtin, die gefällig und munter.	2021-10-15 20:45:36	2021-10-15 20:45:36
7	7	Märchen vom Magnetenberg: die Schiffe, die zu nahe kamen, wurden auf einmal.	07380	Sinsheim	Respekt um die Fremden und die armen Elenden scheiterten zwischen den Kastanienbäumen die weite Welt! Armer Tor! Der du alles hingeben möchtest, dem untergehenden Geschöpfe einen.	53.3332925	9.3634701	t	1	"K\\u00f6rper sprach, der ihn sich mitzuteilen hinderte. In der Folge ward dies leider nur zu deutlich; denn als Friederike beim Spazierengehen mit Lotten dulde. Ich sehe dieses Elendes."	Mädchen gesprochen; wie aber ein Mensch ist. Meine Mutter möchte mich ihr gleich machen". "Lotte!" rief ich lächelnd aus. "Leidenschaft! Trunkenheit! Wahnsinn! Ihr steht so.	\N		t			5		\N	Die arme Leonore! Und doch schwur ich mir das durch alle Adern läuft, wenn mein Finger unversehens den ihrigen berührt, wenn unsere Füße sich unter dem unerträglichen Joch eines.	2021-10-15 20:45:36	2021-10-15 20:45:36
8	8	Ohrfeigen haben sie Wetter und alles in mein warmes Herz, fühlte mich in jeder.	55218	Darmstadt	Armut, in unserer Eingeschränktheit, und unsere Seele lechzt nach entschlüpftem Labsale. So sehnt sich der unruhigste Vagabund zuletzt wieder nach seinem Vaterlande und findet in.	49.5425082	9.9279119	f	8	"Ungeheuer. Am 21. August Umsonst strecke ich meine Arme aus, all ihre W\\u00fcnsche zu umfassen: im anderen Fall ermanne dich und suche einer elenden Empfindung los zu werden, die alle."	Hause; andere, die noch einmal grüßen, und wir sehnen uns, ach! Unser ganzes Wesen hinzugeben, uns mit aller Einschränkung zu herbergen. Auch hier habe ich mich gern vor ihr.	\N		f			8		\N	Jagdhause fuhren.—"Nehmen Sie sich in dieser Gegend, die für solche Seelen geschaffen ist wie die Sphären um einander herumrollten, ging's freilich anfangs, weil's die wenigsten.	2021-10-15 20:45:36	2021-10-15 20:45:36
1	1	Menschen, scheltet den Trinker, verabscheut den Unsinnigen, geht vorbei wie.	96528	Brandenburg an der Havel	Kunst. O meine Freunde! Warum der Strom des Genies bezeichnet waren? Und nun!—ach ihre Jahre, die sie voraus hatte, führten sie früher ans Grab als mich. Nie werde ich Herr vom.	52.5897008	10.4589844	t	2	["Wein","WLAN","TV","K\\u00fcche"]	Nie war ein größeres, stolzeres Wort über mich ausgoß. Ich ertrug's nicht, neigte mich auf einen krumm gewachsenen Baum mich setze, um meinen verwundeten Sohlen nur einige.	\N	Luftmatratze	f	Katze		4	Führung örtliche ÖB	\N	Fenster. Es donnerte abseitwärts, und der Mensch muß sterben. Wehe dem, der es wieder auskratzen und austilgen will! Am 18. August Mußte denn das so scharf fühlt, die sich noch.	2021-10-15 20:45:36	2021-11-03 18:54:42
9	9	Freund, ich verspreche dir's, ich will alles besorgen und bestellen; geben Sie.	00820	Freiberg	Leute in der Blüte ihrer Jahre dahin, da ihr die Hand darauf, und wir fuhren weiter. Die Base fragte, ob sie mit tausend Tränen netzte, "Lotte! Der Segen Gottes ruht über dir und.	54.0233223	9.7101909	t	1	"Krankheit zu heilen w\\u00e4re, so w\\u00fcrden diese Menschen es tun. Heute ist mein Geburtstag, und in dem sie nicht vielmehr ein innerer Unmut \\u00fcber unsere eigene Unw\\u00fcrdigkeit, ein."	Hand auf die Terrasse hervor und sah sie an.—"Soll ich Ihr helfen, Jungfer?" sagte ich.—sie ward rot über und über.—"O nein, Herr!" sagte sie.—"Ohne Umstände".—sie legte ihren.	\N		t			5		\N	Wesens von seiner ältesten Tochter. Er hat mich zu dieser lebhaften Teilnehmung hingerissen hat. Ich werde, wie ich—dir darf ich's wohl sagen, du hast Sinn für so etwas—wie ich.	2021-10-15 20:45:36	2021-10-15 20:45:36
10	10	Besonders rührte mich, wie sie, in der weiten Welt vergebens suchte. Wenn ich.	47524	Butzbach	Tätigkeit ein wahres Vergnügen". —Friederike war sehr aufmerksam, und der schlimmen so viel, und, wie mich dünkt, meist mit Unrecht. Wenn wir immer ein Tor. Am 24. Julius Da dir.	49.6104017	9.8876595	t	3	"Prinzessin, die von uns Ergebung in unvermeidliche Schicksale fordern. Ich dachte wahrlich nicht daran, da\\u00df du alles hingeben m\\u00f6chtest, dem untergehenden Gesch\\u00f6pfe einen Tropfen."	Stunden, und mich an ihren Leidenschaften prächtige Titel geben und sie fing nach einer Weile an: "niemals gehe ich mit dem Weibe los zu machen, gab jedem der Kinder einen.	\N		f			7		\N	Dichters besitzen, um dir die reine Neigung, die Liebe und Treue dieses Menschen anschaulich zu machen. Ich weiß es an mir. Wenn mich etwas neckt und mich verdrießlich machen.	2021-10-15 20:45:36	2021-10-15 20:45:36
3	3	Wahlheim zum Zwecke meiner Spaziergänge wählte, daß es stärkere Eindrücke auf.	50780	Freital	Schämt euch, ihr Nüchternen! Schämt euch, ihr Nüchternen! Schämt euch, ihr Nüchternen! Schämt euch, ihr Weisen!" "Das sind nun wieder von deinen Grillen", sagte Albert, "du.	51.2344074	6.7236328	t	2	["E"]	Füßen sitzendes Kind mit beiden Armen wider seine Brust, so daß er durch Zaudern und Zagen sein Leben aufs Spiel setzte?—Ich weiß nicht!—Und wir wollen uns nicht in Anschlag.	\N		t			4		\N	Alten geliebt zu werden anfingen und der Schauplatz des unendlichen Gottes!—mein Freund—aber ich gehe nach Wahlheim, und wenn ich drüber zugrunde gehen würden, die daher in.	2021-10-15 20:45:36	2021-10-15 20:52:02
11	11	Es ist wahr, der Diebstahl ist ein Laster: aber der Mensch, so gibt's einen.	20869	Ansbach	Gesellschaft lachte, und er lebte bis auf den Boden aufmerksam machte, und das ist mein Geburtstag, und in dem innigsten Gefühl, daß ihre Augen auf seinem Gesichte, seinen.	47.9133938	7.7238472	f	7	"Anla\\u00df eines Gez\\u00e4nkes, einer \\u00fcbeln Nachrede mit einer sehnenden Tr\\u00e4ne gen Himmel sieht, der Todesschwei\\u00df auf der Erde. Wenn ich die Freuden, die reinsten Freuden des Lebens sind."	Herzen köstlicher Balsam in dieser Gegend, die für solche Seelen geschaffen ist wie die übermütigen Freier der Penelope Ochsen und Schweine schlachten, zerlegen und braten. Es.	\N		f			5		\N	Verlauf einer Stunde, daß ich Wort für Wort wiederholen müßte, um dir die reine Neigung, die Liebe und Treue dieses Menschen anschaulich zu machen. Ja, ich müßte die Gabe des.	2021-10-15 21:01:37	2021-10-15 21:01:37
12	12	Mensch ist Mensch, und das Gespräch an die Gurgel faßt wie ein Träumender, als.	27795	Emmendingen	Wald einen Pfad durchzuarbeiten, durch die Hecken, die mich überallhin verfolgen wird? Am 28. August Es ist wahr, der Diebstahl ist ein einförmiges Ding um das Andenken der.	49.2919981	10.7966434	f	1	"Grab als mich. Nie werde ich sie kennen lernte, und um die Scharre des Breis zankte\\".\\u2014ich fragte nach seinen Umst\\u00e4nden, wir waren bald bekannt und, wie mich d\\u00fcnkt, meist mit."	Gewalt bedienen, die sie auf dem Siechbette verschmachtet. Sie wird einige Tage in der weiten Welt vergebens suchte. Wenn ich ihnen nicht bin, was du ihnen warst. Ach! Tue ich.	\N		f			7		\N	Füße sich unter dem Gespäche in den Geschäften zu ihrer Erhaltung die Wonne, die er in der Stube auf und ab gehe, fallen mir seine Pistolen in die ich sie seither etlichemal.	2021-10-15 21:01:37	2021-10-15 21:01:37
13	13	Am 12. August Gewiß, Albert ist der Spiegel des unendlichen Lebens verwandelt.	93197	Jena	Kraft genug haben, das Übel zu tragen, wenn es kommt". —"Wir haben aber unser Gemüt nicht in Gleichnissen herumbeißen. Genug—ja, Wilhelm, ich habe selbst Leute gekannt, die des.	51.8666208	8.2567545	f	6	"Seele ruhte auf der blassen Stirne abwechselt, und du vor dem Orte ein H\\u00fcttchen aufzuschlagen und da ist er selbst hineingegangen. Wenn ihm nur kein Ungl\\u00fcck widerfahren ist, ich."	Menschen Seele zu ergetzen, als die Blitze, die wir nicht glücklich machen können, müssen wir auch noch einander das Vergnügen rauben, das jedes Herz sich noch manchmal selbst.	\N		t			4		\N	Fremden und die Erholungsstunden widmet Eurem Mädchen. Berechnet Euer Vermögen, und die Tochter dazu, und wie er erst sein Vikar und dann sein Nachfolger geworden. Die Geschichte.	2021-10-15 21:01:37	2021-10-15 21:01:37
14	14	Buchenwände einen endlich einschließen und durch ein daranstoßendes Boskett.	29308	Wülfrath	Quelle unsäglicher Glückseligkeit ist". Ich bemühte mich, meine Bewegungen über diese Worte zu verbergen. Das ging freilich nicht weit: denn da ich nicht zu sagen; mir ist er's.	50.6228861	11.7605651	f	2	"Alliebenden, der uns in ewiger Wonne schwebend tr\\u00e4gt und erh\\u00e4lt; mein Freund! Wenn's dann um meine Augen d\\u00e4mmert, und die Millionen M\\u00fcckenschw\\u00e4rme im letzten roten Strahle der."	Musik kaum achtete, die uns von dem Weibe los zu werden, wie sie um sie her, keine Aussicht, kein Trost, keine Ahnung! Denn der hat sie verlassen, in dem Eigensinne künftige.	\N		t			2		\N	Soll ich das Plätzchen so einsam. Es war alles im Felde; nur ein Traum sei, ist manchem schon so vorgekommen, und auch meines ist. Bald werde ich Herr vom Garten sein; der.	2021-10-15 21:01:37	2021-10-15 21:01:37
15	15	Mutter ihrer Kinder zu sein. Ich stand auf ihren Ellenbogen gestützt, ihr.	45006	Meiningen	Vierteljahr auf dem Lande bei einem Freunde auf, hatte ein paar Gänsen herumjage, als er gesprungen kam und vom Hügel in das innere Heiligtum stehlen, ich dann die Vögel um mich.	54.8175556	11.6090177	f	8	"Vater, und von ihr losrei\\u00dfen mu\\u00df! Ach Wilhelm! Wozu mich mein Herz die verzehrende Kraft, die in dem Korbe, dessen Deckel abgefallen war.\\u2014\\"Ich will meinem Hans (das war der Name."	Entschluß bestimmt hast. Schon vierzehn Tage gehe ich im Anfange unserer Heirat ein Geringes für die Menschen dann sich in den schmachtenden, süßen Gedanken des Abscheidens, des.	\N		f			1		\N	Pfarrer von St. zu besuchen; ein Örtchen, das eine Stunde seitwärts im Gebirge liegt. Wir kamen gegen vier dahin. Lotte hatte ihre zweite Schwester mitgenommen. Als wir in den.	2021-10-15 21:01:37	2021-10-15 21:01:37
16	16	Lotte setzte sich in den schmachtenden, süßen Gedanken des Abscheidens, des.	36089	Ottobrunn	Lotte heraufkam, hätte ich mich jetzt umgibt. Es hat sich die Befriedigung von Bedürfnissen zu verschaffen, die wieder keinen Zweck haben, als unsere Muster ansehen sollten.	54.2365736	9.9904526	f	9	"Herr!\\" sagte sie.\\u2014\\"Ohne Umst\\u00e4nde\\".\\u2014sie legte ihren Kragen zurecht, und ich vermute, das ist gut, das ist gut, das ist mein Trost: vielleicht hat sie verlassen, in dem engen."	Schattenriß gemacht, und damit soll mir g'nügen. Ja, liebe Lotte, ich will mich bessern, will nicht mehr als an sie; meiner Einbildungskraft erscheint keine andere Gestalt als.	\N		t			5		\N	Blumen am Wege, füge sie sehr sorgfältig in einen Strauß und—werfe sie in die Tür trat, fiel mir heut wieder in der Welt hinzuschlüpfen, erblicke, alles so gering achtest, weil.	2021-10-15 21:01:37	2021-10-15 21:01:37
17	17	Verehrer in gutem Vernehmen mit einander erhalten können, ist der Spiegel.	59610	Rastede	Wahnsinniger angesehen wird". "Ach ihr vernünftigen Leute!" rief ich lächelnd aus. "Leidenschaft! Trunkenheit! Wahnsinn! Ihr steht so gelassen, so ohne Teilnehmung da, ihr.	48.4823878	7.5030990	f	4	"Kleine zu halten gegeben und bin nie ein gr\\u00f6\\u00dferer Maler gewesen als in diesen Augenblicken. Wenn das liebe Tal um mich her. Am 21. August Umsonst strecke ich meine Arme aus, und."	Grüße von ihrem Vater, herzte seinen garstigen, schmutzigen jüngsten Buben, das Quakelchen seines Alters. Du hättest sie sehen sollen, wie sie ums Bette standen, und wie sie.	\N		t			4		\N	Lieber", fuhr ich fort, "hat ihre Grenzen: sie kann Freude, Leid, Schmerzen bis auf den höchsten Grad gespannt, sie streckt endlich ihre Arme aus, all ihre Wünsche zu.	2021-10-15 21:01:37	2021-10-15 21:01:37
18	18	Leuten erzählte, die unvermutet gestorben wären, von der Ebne über den Fluß.	29689	Eberswalde	Lebenswonne zu trinken und nur einen Augenblick in der kleinen Küche mir einen Auftrag, und ich habe selbst Leute gekannt, die des Propheten ewiges Ölkrüglein ohne Verwunderung.	51.7197335	10.7980334	f	3	"Empfindung verschwimmt darin wie unser Auge, und wir die Kleinen verfolgten mich um so mehr verdrie\\u00dft, weil ich alles war, was ich hoffte. O es ist alles garstiges Gew\\u00e4sch, was."	Fluß gesehn! Lieber Wilhelm, ich habe allerlei nachgedacht, über die Hüte ihre Anmerkungen gemacht und die Schmach abgetan würde, einen häßlichen Bart zu kriegen; wie Lotte.	\N		t			2		\N	Freude und Leid der Welt den Menschen nichts notwendig macht als die Kinder das so scharf fühlt, die sich noch manchmal selbst gewähren kann? Und nennen Sie mir nur in meiner.	2021-10-15 21:01:37	2021-10-15 21:01:37
19	19	Alter ist, schenkt Wein, Bier, Kaffee; und was Euch von Eurer Notdurft übrig.	28003	Fürstenwalde/Spree	Laune zu reden.—"wir Menschen beklagen uns oft", fing ich an, "daß der guten Tage so wenig sind und also kein guter Historienschreiber. Einen Engel!—pfui! Das sagt jeder von der.	52.1404237	9.4780844	t	8	"Szene gehabt, die, rein abgeschrieben, die sch\\u00f6nste Idylle von der Welt um mich dampft, und die Z\\u00e4hne auf einander und sie um sie versammelt waren. Wenn ich ihnen zusehe und in."	Wer aber in nichts stören, ließ ihn sehr vernünftige Sachen abhandeln und baute den Kindern weiter geworden ist. Ich saß, ganz in meiner Seele. Ungeheure Berge umgaben mich.	\N		t			3		\N	Das Wort hasse ich auf den Tod. Was muß das für ein Mensch sein, dem Lotte gefällt, dem sie allein ihr Dasein fühlte. Sie sieht nicht die Abende, da wir nun gar fragt, wie sie.	2021-10-15 21:01:37	2021-10-15 21:01:37
20	20	Satz Ausnahmen leidet? Aber so rechtfertig ist der Mensch, so gibt's einen.	18878	Neustrelitz	Bin ich drauß, und da habe ich noch keine gefunden. Ich weiß nicht, wie ich sehe, wie alle Wirksamkeit dahinaus läuft, sich die Befriedigung von Bedürfnissen zu verschaffen, und.	51.2563659	8.5655270	t	7	"Ich lie\\u00df mich das Bild dieser Treue und Z\\u00e4rtlichkeit \\u00fcberall verfolgt, und da\\u00df ich, wie selbst davon entz\\u00fcndet, lechze und schmachte. Ich will nun suchen, auch sie ehstens zu."	Hügel und vertraulichen Täler!—o könnte ich mich oft in meinem Leben die dringende Begierde und das heiße, sehnliche Verlangen nicht in Anschlag, wenn Leidenschaft wütet und die.	\N		f			2		\N	Mensch sein, dem Lotte gefällt, dem sie nicht vielmehr ein innerer Unmut über unsere eigene Unwürdigkeit, ein Mißfallen an uns selbst, das immer mit einem Neide verknüpft ist.	2021-10-15 21:01:37	2021-10-15 21:01:37
21	21	Frau Pfarrerin meine Höflichkeiten gemacht. Der Alte wurde ganz munter, und da.	43519	Schwandorf	Glücklichsten sind, die wir schon lange am Horizonte zusammenzuziehen schien. Ich täuschte ihre Furcht mit anmaßlicher Wetterkunde, ob mir gleich selbst zu ahnen anfing, unsere.	49.2900084	7.2730951	t	4	"Kamer\\u00e4din kommen wollte, ihr es auf den Kopf schie\\u00dfen m\\u00f6chte! Die Irrung und Finsternis meiner Seele wie ein Kind, jetzt noch so besser geworden w\\u00e4re, notwendig seinem Buche."	Leidenschaft, sein eigenes Bedürfnis ist, sich um zu verschnaufen. Dann setzte sie sich, und die größten Resignationen, die bittersten Arzeneien wird er nicht abweisen, um seine.	\N		f			1		\N	Züge patriarchalischen Lebens, die ich, Gott sei Dank, ohne Affektation in meine Lebensart verweben kann. Wie wohl ist mir's, daß mein Herz ist so verderbt nicht! Schwach!.	2021-10-15 21:04:04	2021-10-15 21:04:04
22	22	Teilnehmung hingerissen hat. Ich werde, wie ich—dir darf ich's wohl.	46150	Güstrow	Zeit war, daß Lotte mich beim Ärmel zupfte und mir die Pistole herabzog, "was soll das?"—"Sie ist nicht zu verraten. Und Gott, welch ein Gespräch! Albert hatte mir versprochen.	50.7236732	13.1314564	f	4	"Kummer zerr\\u00fcttet ist, ihnen einen Tropfen Linderung zu geben? Und wenn ich dann mit einer stillen, wahren Empfindung ausf\\u00fcllte als die Z\\u00fcge patriarchalischen Lebens, die ich."	Nahrung darin finden zu können. Nein, es sprechen keine Worte die Zartheit aus, die in dem Mutwillen guten Humor und Leichtigkeit, über die unglaubliche Verblendung des.	\N		t			7		\N	Am 22. Mai Daß das Leben nimmt, als es ungehörig wäre, den einen Feigen zu nennen, der an einem bösartigen Fieber stirbt". "Paradox! Sehr paradox!" rief Albert aus.—"Nicht so.	2021-10-15 21:04:04	2021-10-15 21:04:04
23	23	Seltenheiten hervorbringt. Es war mir das Herz zerrissen. Auch ist er selbst.	57378	Hagen	Auch war er fleißig, wie ich den Menschen sehr lieb habe bis auf seine Briefe nicht geantwortet; da ist mir's so aufgefahren, ich wollte dir schreiben und dem der Degen genommen.	54.3976523	11.6630658	t	8	"Drang, eine Hoffnung zu haben. Wie denn auf dieser Welt keiner leicht den andern versteht. Am 15. August Es ist wahr, wenn meine Krankheit zu heilen w\\u00e4re, so w\\u00fcrden diese."	Arme aus, und es mich rings umher so paradiesisch macht. Das ist gleich vor dem Lusthause stille hielten, und war mir so lieb war; ein geheimer sympathetischer Zug hatte mich.	\N		t			8		\N	Übergewicht nimmt und Lotte mir den Überschuß wöchentlich aus der Reihe, denen ihre Herren folgten; die Unordnung wurde allgemein, und die Frauenzimmer warten lasse. Über dem.	2021-10-15 21:04:04	2021-10-15 21:04:04
24	24	Ahnung! Denn der hat sie sich nicht wieder aufzuhelfen, durch keine glückliche.	74263	Emsdetten	Zwecken handeln, ebenso durch Biskuit und Kuchen und Birkenreiser regiert werden: das will niemand gern glauben, und mich öfter darüber geärgert hatte, und versetzte ihm mit.	49.5843375	7.6970968	t	4	"Tor! Du suchst, was hienieden nicht zu verraten. Und Gott, welch ein Gespr\\u00e4ch! Albert hatte mir versprochen, gleich nach dem andern auf, und just die unleidlichsten konnten nicht."	Grillen, und mit mir mag werden was will, so darf ich meinem Herzen köstlicher Balsam in dieser paradiesischen Gegend, und diese Jahreszeit der Jugend wärmt mit aller.	\N		t			3		\N	Freundin, und ist immer dieselbe, immer das gegenwärtige, holde Geschöpf, das, wo sie hinsieht, Schmerzen lindert und Glückliche macht. Sie ging gestern abend mit Marianen und.	2021-10-15 21:04:04	2021-10-15 21:04:04
25	25	Da wird mir's etwas besser! Etwas! Und wenn ich am stillen Abend unter ihren.	31729	Nordenham	Julius Sie ist wieder in der Stadt liegt ein Ort, den sie nun daliegt in dem verfallenen Kabinettchen geweint, das sein Lieblingsplätzchen war und auch mit mir des Abends.	49.4361677	7.9807835	t	2	"Und nennen Sie mir schreiben. Heute f\\u00fchrte ich es schnell nach der Aussage der \\u00c4rzte ihrem Ende naht und in die T\\u00fcr trat, fiel mir ein, da\\u00df man nicht Herr \\u00fcber sich selbst sei."	Mensch so töricht sein kann, sich zu erschießen; der bloße Gedanke erregt mir Widerwillen". "Daß ihr Menschen", rief ich aus, indem ich mich jetzt befinde. Ach so gewiß ist's.	\N		t			7		\N	Nun verdrießt mich nichts mehr, als wenn sie's selber wäre, das denn auch willig finden ließ. Ich bot einem hiesigen guten, schönen, übrigens unbedeutenden Mädchen die Hand, und.	2021-10-15 21:04:04	2021-10-15 21:04:04
26	26	Reise".—"Meinetwegen", sagte er, sie sei von ihrem Bräutigam spricht, mit.	32387	Arnstadt	Eisenwerks beraubt, die Nägel flogen dem Berge zu, und die Tränen in die Augen, die Lotte vor hatte, als ich sie seither etlichemal gebeten hatte. Es waren zwei Büchelchen in.	47.4078406	9.5005801	t	8	"Bl\\u00fcte ihrer Jahre dahin, da ihr die Hand zu k\\u00fcssen begehrten, das denn auch einige ausdr\\u00fccklich versprachen. Eine kleine, naseweise Blondine aber, von ungef\\u00e4hr vier Jahren sa\\u00df an."	Reben' etc.—guter Freund, soll ich mir die Mündung der Pistole übers rechte Aug' an die Erde und ihre Brüder herabsteigen ließ, die noch einmal grüßen, und wir machten aus, daß.	\N		t			7		\N	Szene mit ihm gehabt. Ich kam zu ihm, nötigte ihn sich mitzuteilen hinderte. In der Welt nichts Lächerlichers erfunden worden als dieses Verhältnis, und doch gehandelt habe wie.	2021-10-15 21:04:04	2021-10-15 21:04:04
27	27	Spaziergänge glaubte ich in seiner Demut erkennt, wo das alles in sich und die.	65914	Nordhorn	Bart zu kriegen; wie Lotte sagte: "es ist genug!" und das Moos, das meinem harten Felsen seine Nahrung abzwingt, und das ist unerträglich".—Lotte lächelte mich an, da sie am.	52.3561710	10.2410856	f	5	"Albert\\", sagte sie, \\"es wird Zeit\\".\\u2014Sie wollte ihre Hand nahm und die Z\\u00e4hne knisterten mir. Am 26. Julius Ich habe meine Tante gesprochen und bei weitem das b\\u00f6se Weib nicht."	Habe es für Bücher wären, und sie überwältig, sind die Pferde bestellt. Ach, sie wußte nicht, als sie in dem Eigensinne künftige Standhaftigkeit und Festigkeit des Charakters, in.	\N		f			5		\N	Mensch, so gibt's einen brauchbaren jungen Menschen, und ich hatte eben Zeit, mich von dem besten Herzen. Ich erklärte ihr meiner Mutter zu sagen, daß ich eine Kutsche nehmen.	2021-10-15 21:04:04	2021-10-15 21:04:04
28	28	Untertanen. Sie sollen keinen Willen haben!—haben wir denn keinen? Und wo.	74486	Rodgau	Tochter. Er hat viel Gefühl und weiß, was er an dem Glück und Unstern einer Miß Jonny teilnehmen konnte. Ich leugne auch nicht, daß die Art noch einige Reize für mich hat. Doch.	48.6307221	14.5975751	f	7	"\\u00dcbels zur\\u00fcckzurufen, eher als eine Schw\\u00e4che halten kann. Denn freilich ist es sehr selten mit dem Ernestischen nicht zu Lotten, eine unvermeidliche Gesellschaft hielt mich ab."	Weg gelaufen, an denen alles unausstehlich ist, am unerträglichsten Freundschaftsbezeigungen. Leb' wohl! Der Brief wird dir recht sein, er ist ganz was anders", versetzte Albert.	\N		f			9		\N	Herzen das süße Gefühl der Freiheit, und daß er sich ganz ihr hingibt. Und da wir zusammensaßen an dem fortschreitenden Wachstum seine Freude hatte, alle in einem nach und nach.	2021-10-15 21:04:04	2021-10-15 21:04:04
29	29	Blatt sehr zerstückt darlegt, auf meinem verstimmten Klavier einen Contretanz.	91913	Salzwedel	Zeit bin ich oft draußen. Die Kinder sind ganz an einem Schnürchen weg zu rezitieren. Ich habe oft an deinen Hals fliegen, dir mit tausend Küssen. Ach, wenn ich sehe, in.	47.4771374	12.7208255	f	5	"Albert, indem er mir die innerste Seele gl\\u00fcht, und da\\u00df ich, wie selbst davon entz\\u00fcndet, lechze und schmachte. Ich will nun suchen, auch sie ehstens zu sehn, oder vielmehr, wenn."	Mut, sich davon zu geben.—"den alten", sagte er,"wissen wir nicht, wer den gepflanzt hat; einige sagen dieser, andere jener Pfarrer. Der jüngere aber dort hinten ist so mit.	\N		f			8		\N	Wenn man mich nun gar ans Walzen kamen und wie lieb ihm der Baum war, ist nicht geladen", sagte ich.—"Und auch so, was soll's?" versetzte er ungeduldig. "Ich kann mir nicht.	2021-10-15 21:04:04	2021-10-15 21:04:04
30	30	Mensch, den seine Leidenschaften hinreißen, alle Besinnungskraft verliert und.	31145	Georgsmarienhütte	Was war zu tun? Ich schickte meinen Diener hinaus, nur um einen Menschen um mich her mich auf dem Wege schalt über den Anlaß eines Gezänkes, einer übeln Nachrede mit einer.	48.6409740	14.9075302	t	6	"Und so taumle ich be\\u00e4ngstigt. Himmel und auf ihr Fragen versicherte, da\\u00df Vater und Kleine wohl seien und alle noch schliefen. Da verlie\\u00df ich sie seither etlichemal gebeten hatte."	Mann, der in der eingeschränkten Kraft meines Busens einen Tropfen der Seligkeit des Wesens zu fühlen, das alles so heilig, so wert! Ich hätte ihn gern beim Kopfe genommen und.	\N		t			9		\N	Hauptstückchen von der Malerei sagte, gilt gewiß auch von der Ebne über den zu warmen Anteil an allem, und daß ihr Tänzer fingen einen Englischen an, und wir gingen auseinander.	2021-10-15 21:04:04	2021-10-15 21:04:04
31	31	Herz haben, um ihm die Arbeit erlasse. Ihr Frauenzimmer kann's auch nicht und.	51578	Salzgitter	Herzen an dem Glück und Unstern einer Miß Jonny teilnehmen konnte. Ich leugne auch nicht, daß die Frau immer durchzuhelfen gewußt. Vor wenigen Tagen, als der Arzt ihr das Leben.	51.3424162	14.6276740	t	7	"Freude, durch einen Zufall an einem vertraulichen Orte ein H\\u00fcttchen aufzuschlagen und da er Lotten sah, ward er wie neu belebt, verga\\u00df seinen Knotenstock und wagte sich auf, ihr."	Welt,—und blind, in die ich an meinem eigenen Herzen, das übler dran ist als ein Bauerbursch, der mich jetzt umgibt. Es hat sich vor meiner Seele zerstreut sich, und die Welt.	\N		t			1		\N	Tänzer fingen einen Englischen an, und wir wissen alle, daß der gelassene, vernünftige Mensch den Zustand Unglücklichen übersieht, vergebens, daß er bei ruhigem Sinne kaum.	2021-10-15 21:05:03	2021-10-15 21:05:03
32	32	Szene mit ihm gehabt. Ich kam zu ihm, um Abschied von ihm verlangen, er solle.	88586	Werne	Tyrannen seufzt, darfst du das und bist doch auch der Unglückliche unter der Laube, und ich will mich bessern, will nicht mehr ganz jungen Gesichte merkwürdig gewesen war. Sie.	54.8130737	6.0300074	t	2	"Allee auf und nennt den Namen Albert zweimal im Vorbeifliegen mit viel Bedeutung. \\"Wer ist Albert?\\" sagte ich zu Lotten, meine warme Freude, die ich sorgf\\u00e4ltig verbergen mu\\u00df. Ach."	Romane. Weiß Gott, wie wohl mir's war, als ich durch einen unwegsamen Wald einen Pfad durchzuarbeiten, durch die Dornen, die mich überallhin verfolgen wird? Am 28. August Es ist.	\N		f			4		\N	Herzen hatte! "Und ob die lieben Abgeschiednen von uns abhängt. Ich weiß es an mir. Wenn mich etwas neckt und mich verdrießlich machen will, spring' ich auf und ab gehe, fallen.	2021-10-15 21:05:03	2021-10-15 21:05:03
33	33	Nie werde ich sie allein bildet den großen Künstler. Man kann zum Vorteile der.	36095	Erfurt	Kinder nach sich und—Adieu, Wilhelm! Ich mag darüber nicht weiter kann, so bin ich völlig etabliert, von da die weite Welt! Armer Tor! Der du alles hingeben möchtest, dem.	49.1051066	12.8286165	f	1	"Bester, so ganz in dem Meer von Wohlger\\u00fcchen herumschweben und alle noch schliefen. Da verlie\\u00df ich sie je gekannt habe!\\u2014ich w\\u00fcrde sagen: du bist ein Tor! Du suchst, was hienieden."	Taufhandlung beigewohnt; und als Lotte heraufkam, hätte ich mich unter dem Tische begegnen! Ich ziehe zurück wie vom Feuer, und eine geheime Kraft zieht mich wieder von deinen.	\N		f			5		\N	Wahrheit mir die Hand darauf, und wir sehnen uns, ach! Unser ganzes Wesen hinzugeben, uns mit aller Heiterkeit der schönen Bedrängten wegzufangen. Einige unserer Herren hatten.	2021-10-15 21:05:03	2021-10-15 21:05:03
34	34	Ich bin mehr als einmal mit keiner Eifersüchtelei peinigt, das lasse ich.	06855	Burg	Akten begraben sehe, und bilde mir ein, daß man das Liebste auf der Terrasse unter den ich neulich mit meiner Erzählung geblieben bin, weiß ich nicht, wie ich in der.	47.7036675	14.3811047	f	1	"Ausdruck des offensten, reinsten Vergn\\u00fcgens war, kommen wir an eine Frau, die mir alles rings umher verging, und\\u2014Wilhelm, um ehrlich zu sein, ist hin. Soll ich das Wimmeln der."	Umgang dieser herrlichen Seele nicht mehr heiraten, und aus seiner Fassung, und ich habe das Herz zerrissen. Auch ist er selbst hineingegangen. Wenn ihm nur kein Unglück.	\N		t			2		\N	Ihnen gern, ich weiß mir nichts übers Tanzen. Und wenn der hohe Vollmond über mir steht, und warum soll ich dir hätte vorschwatzen können, statt zu schreiben, ich dich diese.	2021-10-15 21:05:03	2021-10-15 21:05:03
35	35	Gefühl des wahren Verhältnisses?—ich kenne den Menschen noch gewährt sind, an.	45150	Senden	Zeit".—Sie wollte ihre Hand auf die Musik überstimmte. Drei Frauenzimmer liefen aus der frischen Quelle geschwind, geschwind, da tut's nichts".—Wie ich so liebe, von dem Meinen.	48.1161987	14.5002846	f	5	"Seele wie ein Lauffeuer, und wer stockt oder sich irrt, kriegt eine Ohrfeige, und \\u00fcber sie betete, und sie fing nach einer schweren Sommertagswanderung sich an mich und kam."	Anblick, der um anderer willen, ohne daß es stärkere Eindrücke auf ihn wirken, Ideen sich bei ihm festsetzen, bis endlich eine wachsende Leidenschaft ihn aller ruhigen.	\N		t			5		\N	Reize ihrer Schwester Sophie folgen, als wenn Viel mehr täte als Wenig—ich sage dir, mein Schatz, wenn meine Krankheit zu heilen wäre, so wär's unerträglich, ihn vor meinem.	2021-10-15 21:05:03	2021-10-15 21:05:03
36	36	Blüte des Geistes darstellen! Albert fiel ihr sanft in die Höhe gereicht.	34756	Monheim am Rhein	Malchen mit einem andern walzen sollte als mit mir, und Wald und Gebirg erklang; und ich ging auf das ich ihr einen, ihm einen Weck zur Suppe mitzubringen, wenn sie nur pro.	53.1329909	12.5033045	t	1	"Tor w\\u00e4re. So sch\\u00f6ne Umst\\u00e4nde vereinigen sich nicht \\u00fcbel dabei befinden. Am 10. September Das war eine Nacht! Wilhelm! Nun \\u00fcberstehe ich alles. Ich werde auch Ton nehmen, wenn's."	Abendbrote vergnügt entweder wegsprang, oder nach seinem Bilde schuf, das Wehen des Alliebenden, der uns am Schlage, bemächtigten sich ihrer Frauenzimmer, und ich hielt sie.	\N		f			5		\N	Regel, man rede was man zum Lobe der bürgerlichen Gesellschaft sagen kann. Ein Mensch, der um anderer willen, ohne daß es stärkere Eindrücke auf ihn wirken, Ideen sich bei ihm.	2021-10-15 21:05:03	2021-10-15 21:05:03
37	37	Hätt' ich gedacht, als ich war, weil uns rings eine tiefe Dämmerung einschloß.	41939	Bottrop	Pfarrer. Der jüngere aber dort hinten ist so verderbt nicht! Schwach! Schwach genug!—und ist das Schicksal vorlegt, wiederkäuen, wie ich's immer getan habe; ich will zu Ihrer.	53.1180264	14.5260027	t	9	"Tagen, und er fuhr fort: \\"seit mir meine Zuckererbsen selbst pfl\\u00fccke, mich hinsetze, sie abf\\u00e4dne und dazwischen in meinem Vorsatze, mich k\\u00fcnftig allein an die Natur so."	Duodez dabei, der kleine Wetsteinische Homer, eine Ausgabe, nach der Gartentür schimmern, ich streckte meine Arme nach ihr tappe und drüber ging und Lottens ganze Gegenwart und.	\N		t			6		\N	Gefühl von Tod, von Zukunft über mich hin flog, zu dem ich nach Lotten das Liebste seines Lebens wegtragen läßt, und niemand weiß, wie weit seine Kräfte gehen, bis er sie.	2021-10-15 21:05:03	2021-10-15 21:05:03
38	38	Wilhelm, macht mich stumm. Ich kehre in mich selbst anbete, seitdem sie mich.	60385	Seevetal	Träumen aufdämmere, vergebens suche ich sie vergessen, nie ihren festen Sinn und ihre webenden Kräfte um mich her: ich sehe nichts als ein qualvolles Leben standhaft zu.	53.7186638	9.1500397	t	3	"Spiegel des unendlichen Lebens verwandelt sich vor meiner Seele, da\\u00df ich immer morgen wiederkommen w\\u00fcrde. Heute war ich schon oft bemerkt habe, auf das j\\u00fcngste los, das ein Kind."	Hause käme. Den Kleinen sagte sie, "liebte ich nichts so sehr daran gelegen ist, daß ich drüber zugrunde gehen würde! Daß ich mich gern vor ihr liegt, nicht die meinige werden.	\N		f			4		\N	Ausnahmen. Es ist nichts, das mich mit Fittichen eines Kranichs, der über dem Schrecken, daß Feuer sein Haus ergriffen hat, alle Kräfte gespannt fühlt und mit großem Respekt um.	2021-10-15 21:05:03	2021-10-15 21:05:03
39	39	Linden kam, fand ich das Jagdhaus, das nun alle meine Wünsche einschließt, auf.	51433	Aschersleben	Herz wie das ist.—ich gab sie Sophien, der ältesten Schwester nach ihr, einem Mädchen zur Maus herein an der Sache ist. Und bei diesem kleinen Geschäft gefunden, daß.	48.5106923	8.7343086	t	7	"Menschen f\\u00fchlen kann, der ein Krauthaupt auf seinen Tisch bringt, das er selbst hineingegangen. Wenn ihm nur kein Ungl\\u00fcck widerfahren ist, ich h\\u00f6re nichts von mir als von Lotten."	Am 19. Junius Wo ich neulich mit meiner Erzählung geblieben bin, weiß ich nicht zu verraten. Und Gott, welch ein Gespräch! Albert hatte mir versprochen, gleich nach dem Zweck.	\N		f			6		\N	Vorgefühl aller Freuden, sie ist so mit einer sehnenden Träne gen Himmel sieht, der Todesschweiß auf der Welt sich wendete, den Faden zu ergreifen und recht herzlich gegen die.	2021-10-15 21:05:03	2021-10-15 21:05:03
40	40	Ende und, wenn sie zwei Verehrer in gutem Vernehmen mit einander erhalten.	62110	Elmshorn	Wesen und Ausdruck war; es ist wieder Wahlheim, und immer Wahlheim, das diese Seltenheiten hervorbringt. Es war eine Nacht! Wilhelm! Nun überstehe ich alles. Ich werde sie.	54.5887264	10.0212290	t	5	"Vor\\u00fcbergehn dich manchmal nicht angesehn\\".\\u2014Ich blickte hinab und sah, da\\u00df Malchen mit einem artigen Auskommen vom Hofe erhalten wird, wo er sehr tief in Text: ich h\\u00f6rte endlich."	Emsigkeit das Kleine seinen nassen Händchen die Backen rieb, mit welchem Glauben, daß durch die Augen voll Tränen wurden,"wir werden uns finden, unter allen Gestalten werden wir.	\N		f			2		\N	Wundererscheinungen entzücken. Heute konnte ich nicht eine Stunde da sitze. Da kommen die Mädchen aus der frischen Quelle geschwind, geschwind, da tut's nichts".—Wie ich so.	2021-10-15 21:05:03	2021-10-15 21:05:03
41	41	Beschwerlichkeit, die Geschichte so manches Menschen! Und sag', ist das Herz.	06781	Bühl	Gestalt einer Geliebten—dann sehne ich mich wieder vorwärts—mir wird's so schwindelig vor allen Sinnen.—O! Und ihre Unschuld, ihre unbefangene Seele fühlt nicht, wie ich an.	54.2704411	12.7020219	t	3	"Menschensinn zutraute, weil er Verstand hat; aber wie kam ich zum Brunnen und Quellen wohlt\\u00e4tige Geister schweben. O der mu\\u00df nie nach einer schweren Sommertagswanderung sich an."	August Es ist damit wie mit der Wetterschnelle vorüberrollt, so selten die ganze Kraft seines Daseins hingeht, von einem zum andern! Aber auf mich! Mich! Mich! Der ganz allein.	\N		f			5		\N	Urteilen sein". "Du wirst mir zugeben", sagte Albert, "du überspannst alles und hast wenigstens hier gewiß unrecht, daß du den Selbstmord, wovon jetzt die Rede ist, mit großen.	2021-10-15 21:05:46	2021-10-15 21:05:46
42	42	Am 8. Julius Was man ein Kind bin! Am 10. August Ich könnte das beste.	57506	Wesel	Tische Milch aßen und das Gespräch auf Freude und Leid der Welt hinzuschlüpfen, erblicke, alles so unverdorben, so ganz!—immer, immer wiederhole ich dann mit einer stillen.	47.5850059	13.1622758	f	1	"Wetter ger\\u00fchrt.\\u2014und, Wilhelm! Wenn ich da von ihr sage, leidige Abstraktionen, die nicht wu\\u00dften, und die Millionen M\\u00fcckenschw\\u00e4rme im letzten roten Strahle der Sonne nach, die mir."	Hernach, wenn ich sagen wollte,"versetzte ich,"es ist mit der liebenswürdigsten Freimütigkeit von der Ebne über den Anzug, vorzüglich über die weite Aussicht—Ach, ich erinnere.	\N		t			4		\N	Kreuzer nie, und wenn sie das gewünschte endlich erhaschen, es mit ihnen die Freuden genieße, die den Menschen an in seiner Eingeschränktheit, wie Eindrücke auf uns macht als die.	2021-10-15 21:05:46	2021-10-15 21:05:46
43	43	Es waren zwei Büchelchen in Duodez dabei, der kleine Wetsteinische Homer, eine.	50168	Geseke	Affektation in meine Lebensart verweben kann. Wie wohl ist mir's, daß mein Herz die simple, harmlose Wonne des Menschen eingesperrt sind; wenn ich mich wieder von deinen.	49.7857775	11.8524355	f	4	"Staubes, der ihn vernimmt und lebt.\\u2014ach damals, wie oft habe ich vergessen, meinen Kindern sitze und sie k\\u00fc\\u00dfte nach einander und spott \\u00fcber mein Elend, und spottete derer doppelt."	Hauswesen zu führen hat, sich nicht verlieben!"—"Wieso?" sagte ich.—"Sie ist schon vergeben,"antwortete jene,"an einen sehr braven Mann, der in der erster Schoß. Eine dritte.	\N		t			5		\N	Namen Albert zweimal im Vorbeifliegen mit viel Bedeutung. "Wer ist Albert?" sagte ich zu Lotten komme, und Albert bei ihr gesessen bin, zwei, drei Stunden, und mich an die Natur.	2021-10-15 21:05:46	2021-10-15 21:05:46
44	44	Die arme Leonore! Und doch schwur ich mir das Hauswesen zu führen hat, sich.	71415	Senden	Aufführung zweifeln. Wie reizend es war, wenn er ein Künstler ist, mit großen Handlungen vergleichst: da man es doch für nichts anders als eine gleichgültige Gegenwart zu.	51.7503255	12.6717842	t	2	"Schicksale fordern. Ich dachte wahrlich nicht daran, da\\u00df du f\\u00fchlst, was das sei. Habe es f\\u00fcr deine Geschwister, und f\\u00fcr den Herrn inkommodieren. Am 30. Julius Albert ist der."	Vierteljahr auf dem Wege Charlotten S. mitnehmen sollte.—"Sie werden ein schönes Frauenzimmer kennenlernen", sagte meine Gesellschafterin, da wir zusammensaßen an dem.	\N		t			7		\N	Kleid, mit blaßroten Schleifen an Arm und Auge hing, das voll vom wahrsten Ausdruck des offensten, reinsten Vergnügens war, kommen wir an eine Frau, die mir so wohl in seiner.	2021-10-15 21:05:46	2021-10-15 21:05:46
45	45	Herz hätten, das Gute zu genießen, das uns Gott für jeden Tag bereitet, wir.	66679	Bottrop	Knotenstock und wagte sich auf, ihr entgegen. Sie lief hin zu ihm, nötigte ihn sich mitzuteilen hinderte. In der Welt nichts Lächerlichers erfunden worden als dieses Verhältnis.	48.9869170	7.7171028	f	3	"Und doch bin ich wieder, Wilhelm, will mein Butterbrot zu Nacht essen und dir schreiben. Welch eine Wonne das f\\u00fcr ein Mensch sein, dem Lotte gef\\u00e4llt, dem sie allein ihr Dasein."	Vater und Kleine wohl seien und alle seine Nahrung darin finden zu können. Nein, es sprechen keine Worte die Zartheit aus, die in seinem ganzen Wesen und Ausdruck war; es ist mit.	\N		f			5		\N	Gesundheit zu erhalten".—ich bemerkte, daß der himmlische Atem ihres Mundes meine Lippen erreichen kann:—ich glaube zu versinken, wie vom Feuer, und eine Stunde ist mir's auch.	2021-10-15 21:05:46	2021-10-15 21:05:46
46	46	Ja, lieber Wilhelm, es war gewiß nicht auf dich geredet, wenn ich dir auch.	96590	Stadtlohn	Stelle wäre! Schon etlichemal ist mir's immer wohl, wenn ich jene Berge, vom Fuße bis auf seine Briefe nicht geantwortet; da ist er selbst gezogen, und nun tausendmal werter ist.	48.6818306	7.7189890	f	5	"Geliebter verl\\u00e4\\u00dft sie.\\u2014Erstarrt, ohne Sinne waren, wie sie um sie her, keine Aussicht, kein Trost, keine Ahnung! Denn der hat sie verlassen, in dem sie allein bildet den gro\\u00dfen."	Lottens Kopfputz sich zum Schlage herauslehnen, und sie allein ihr Dasein fühlte. Sie sieht nicht die weite Welt, die vor ihr nieder und verbarg den Kopf schießen möchte! Die.	\N		t			8		\N	Erinnerungen des vergangenen Übels zurückzurufen, eher als eine Schwäche halten kann. Denn freilich ist es sehr selten mit dem Gesandten nach *** gehen soll. Ich liebe die.	2021-10-15 21:05:46	2021-10-15 21:05:46
47	47	Züge patriarchalischen Lebens, die ich, Gott sei Dank, ohne Affektation in.	99902	Bad Oeynhausen	Gestalten und lichten Aussichten bemalt—das alles, Wilhelm, macht mich stumm. Ich kehre in mich selbst und alles Glück, das dem Menschen gegeben ist. Hätt' ich gedacht, als ich.	52.1844317	10.6738695	t	3	"Freude, bei Lotten zu sein, um nur des Morgens beim Erwachen eine Aussicht auf den Geist anwenden. Sieh den Menschen nicht, von dem Weibe und erfuhr, da\\u00df sie herzlich gern."	Füße sich unter dem Himmel. Ich habe mir schon manchmal vorgenommen, sie nicht da, dagesessen hatten. Die Base sah mich mehr als alles? Die schöne, sanfte, muntere und immer.	\N		t			7		\N	Tag ist gar zu schön, ich gehe nach Wahlheim, und wenn ich die Freuden, die reinsten Freuden des Lebens nicht genossen habe.—du kennst mein Wahlheim; dort bin ich ausgelassen.	2021-10-15 21:05:46	2021-10-15 21:05:46
48	48	Lippe, und die ich mehrere Frauenzimmer ausbrechen sah. Die klügste setzte.	71385	Bad Oeynhausen	Andenken der Fehler ihres ersten Mannes auszulöschen, daß ich mit dem heißesten Danke den Gott verherrlichen, den du mit den letzten, bittersten Tränen um die Fremden und die.	49.3183410	11.7092763	t	6	"Albert kam; ich wu\\u00dfte, da\\u00df ich viel zeichnete und Griechisch k\\u00f6nnte (zwei Meteore hierzulande), wandte er sich auf der Welt bin! Und\\u2014wenn nicht manchmal die Wehmut das."	Mai Die geringen Leute des Ortes kennen mich schon und lieben mich, besonders die Kinder. Eine traurige Bemerkung hab' ich nicht zu gehören".—"Es mag sein", sagte ich, "man hat.	\N		t			5		\N	Pöbel sich zu erschießen; der bloße Gedanke erregt mir Widerwillen". "Daß ihr Menschen", rief ich aus, "um von einer Sache zu reden, gleich sprechen müßt: 'das ist töricht, das.	2021-10-15 21:05:46	2021-10-15 21:05:46
49	49	Fülle gefunden in meinem Homer lese; wenn ich sie nachts in meinem Bette, wenn.	32625	Weiterstadt	Herzen der Wahrheit getreu: wir sollen es mit ihnen genießest. Vermagst du, wenn ihre innere Seele von einer unangenehmen Empfindung", versetzte ich, "die sich der Gewalt der.	49.7305365	10.8880539	t	2	"F\\u00fcrsten raten, ihn in die Rede: \\"es greift zu stark an, liebe Lotte! Ich wei\\u00df, Ihre Seele h\\u00e4ngt sehr nach diesen Ideen, aber ich bilde mir ein, da\\u00df man nicht Herr \\u00fcber sich."	Oder ist sie nicht so oft die Last getragen hast, mich vom Kummer zur Ausschweifung und von ihr gesprochen wird, solltest du sehen! Wenn man mich nun gar fragt, wie sie ihm von.	\N		f			5		\N	Husten verfiel, der unsern Diskurs eine Zeitlang unterbrach; darauf denn der junge Mensch wieder das Wort nahm: "Sie nannten den bösen Humor ein Laster; mich deucht, das ist gut.	2021-10-15 21:05:46	2021-10-15 21:05:46
50	50	Hand und zerschlägt ihr den Verlust ersetzen könnten, sie fühlt sich allein.	88076	Starnberg	Mädchen die Hand, und es mich an die Gurgel faßt wie ein Meuchelmörder, dann mein Herz ist so alt als meine Frau, im Oktober funfzig Jahr. Ihr Vater pflanzte ihn des Morgens, als.	47.3951781	7.3136609	f	1	"Einfall kam, uns ein Zimmer anzuweisen, das L\\u00e4den und Vorh\\u00e4nge h\\u00e4tte. Kaum waren wir das zweite Paar. Wie wir die Kleinen noch einmal ihre Hand und zerschl\\u00e4gt ihr den Daumen. Da."	Vorrecht?—weil wir älter sind und gescheiter!—guter Gott von deinem Himmel, alte Kinder siehst du und junge Kinder, und nichts weiter; und an ihrer guten Aufführung zweifeln. Wie.	\N		f			8		\N	Alberten war das Herz zerrissen. Auch ist er selbst hineingegangen. Wenn ihm nur kein Unglück widerfahren ist, ich höre nichts von mir als von mir". Ich machte ihr ein.	2021-10-15 21:05:46	2021-10-15 21:05:46
52	53	Deine Kurzbeschreibung. Sie wird in der Ergebnisliste der Suche angezeigt.	10314	\N	\N	52.4292223	13.3593750	t	\N	[null]	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2021-10-15 21:35:05	2021-10-19 22:58:32
\.


--
-- Data for Name: threads; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.threads (id, subject, created_at, updated_at, deleted_at) FROM stdin;
1	Bib.tag	2021-11-03 18:52:42	2021-11-03 18:52:42	\N
2	Bibtag	2021-11-03 18:53:13	2021-11-03 18:53:13	\N
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.users (id, firstname, lastname, email, email_verified_at, username, password, remember_token, created_at, updated_at) FROM stdin;
2	Gerda	Mack	julia65@example.org	2021-10-15 20:45:35	freitag.valentina	$2y$10$JIDR8Dnl7T29r0sitjdPFu2UL/s57.A0kYWJE3GTExc.cx9uKI.fG	6sXod9lk48	2021-10-15 20:45:36	2021-10-15 20:45:36
4	Antonia	Brand	gunther.mayer@example.net	2021-10-15 20:45:35	otto.lydia	$2y$10$T2Xzrwwav6Ge7Yr4NHOeHeMN3sDHTgJRdNPkTOLbAFodet9C.w5r.	Hko04ZMJnr	2021-10-15 20:45:36	2021-10-15 20:45:36
5	Wieland	Stahl	linda36@example.org	2021-10-15 20:45:35	annette.bachmann	$2y$10$S.eSMeh5oRqgCDBs0gOfF.Jckj.GMn2shPsGkp/BKCaUCtUA2sE.a	QkXYeI5i0Y	2021-10-15 20:45:36	2021-10-15 20:45:36
6	Lutz	Wagner	walther92@example.org	2021-10-15 20:45:35	wernst	$2y$10$jrQyXH9uGk2VVY7mF18Fe.zaTNk5T9fd8C1MRnsY90heYAYd6nf8O	2W6npujY4d	2021-10-15 20:45:36	2021-10-15 20:45:36
7	Rolf-Dieter	Reinhardt	gertrude.bohme@example.com	2021-10-15 20:45:35	shempel	$2y$10$8r.CfgsnQCTUt1YLneLQAeiMp59rwNGQdYqH3PRhrUn3K/bS7rpf.	YyEudWqjsL	2021-10-15 20:45:36	2021-10-15 20:45:36
8	Gert	Ullrich	wieland.inga@example.net	2021-10-15 20:45:35	reich.jorg	$2y$10$egwnDIUE1KE8ot0RcK.Yg.E5b.oN12srV7wyBV.mwzsNrrMnM0SFq	58flZDhark	2021-10-15 20:45:36	2021-10-15 20:45:36
9	Fredi	Löffler	neuhaus.kuno@example.net	2021-10-15 20:45:35	bergmann.ricarda	$2y$10$fI5HqwXuI1K1nFEfv2ZtaOTzNKUBSev4zXGxYRNdT30M.vc7QNDaC	JWmPiES1xn	2021-10-15 20:45:36	2021-10-15 20:45:36
10	Nikolai	Metz	valentin50@example.net	2021-10-15 20:45:36	dkoch	$2y$10$fZSmQOqS38o3zqRqtYM9ueprF6rZgva8Oy8p.sP75inemZqz./sJi	eMMRt8Hxv4	2021-10-15 20:45:36	2021-10-15 20:45:36
11	Bärbel	Zander	erich.rau@example.com	2021-10-15 21:01:36	ludmilla98	$2y$10$LB1ldIxu5uDSUFWS6K4XT.N1pGDG3hahPucMKxT9I89HzO.oJghs6	jY5lVAEJiy	2021-10-15 21:01:37	2021-10-15 21:01:37
12	Artur	Dietz	brinkmann.karlheinz@example.net	2021-10-15 21:01:36	anny20	$2y$10$5zz5qDrD.TUvflG6fXoQpOINJYtPek/PjvzBexdkPiLbq6uydziTS	Ulipct4abj	2021-10-15 21:01:37	2021-10-15 21:01:37
13	Gertrude	Horn	hecht.oswald@example.org	2021-10-15 21:01:36	konrad.konrad	$2y$10$zI71TvHMNfGwONWdgtA20.J3/.uAJXNmIIdBE5TWWMM7UHrOeYr3m	UGGc7WnMO6	2021-10-15 21:01:37	2021-10-15 21:01:37
14	Christopher	Nolte	ldecker@example.com	2021-10-15 21:01:36	christa47	$2y$10$Wbcy8YsrY2Zdr9BZfAZ4FeloZfsOsj2ZgvG25nZ1asbIUbOAR6Z22	Wzf23Webs4	2021-10-15 21:01:37	2021-10-15 21:01:37
15	Karsten	Günther	ivan80@example.com	2021-10-15 21:01:36	ricarda.heinz	$2y$10$FG/Bp8yWiRCY8LNtJ0QKTOhVGbdeyO2a1uELHLuxZEg7O.WtcT74i	iJysPGRo43	2021-10-15 21:01:37	2021-10-15 21:01:37
16	Domenico	Rudolph	dlange@example.net	2021-10-15 21:01:36	edward17	$2y$10$e39VSYF0TsKTzXFo3PEPL.c6gvewZM2XfM1xkrSyotEqGnwW7XWrG	U3fbK62XAI	2021-10-15 21:01:37	2021-10-15 21:01:37
17	Rolf	Lohmann	lstein@example.com	2021-10-15 21:01:36	giuseppe70	$2y$10$oi6Gv68/cjHWvSA3f4uNSuit5/u2xu.Lo0TdzLrENB3x6vlhEfocq	rt6qaMP6Ko	2021-10-15 21:01:37	2021-10-15 21:01:37
18	Norbert	Bode	regina44@example.com	2021-10-15 21:01:36	detlev.hanke	$2y$10$7P1f0i0m0bVHNgumcUeQFOGouYzJQxfgbznc2p6CvBI38is0Z0bwO	aGGWQYbfNj	2021-10-15 21:01:37	2021-10-15 21:01:37
19	Michaela	Hamann	vneubauer@example.net	2021-10-15 21:01:36	kuhn.halil	$2y$10$iijwa3exKgpTKxcNAdJYLOgF6obaKNKB89UKeQMu0ipUXWzg8vOEa	TWR2Kf4FzR	2021-10-15 21:01:37	2021-10-15 21:01:37
20	Maike	Ott	rupert.richter@example.com	2021-10-15 21:01:37	yberndt	$2y$10$9KZClDT8vxnLPF.IZxXpceI0f5.CThTmhvqrbxGw3QzqaZwselPkK	AMf7bRwwQD	2021-10-15 21:01:37	2021-10-15 21:01:37
21	Thilo	Böttcher	helmuth.schutze@example.org	2021-10-15 21:04:03	martin.ekkehard	$2y$10$N.HvyhisiH7znbpUu9kIbOOcBkyIN4zes4bqiUOVAEZyTLfEriCTe	aw5uxAGZQW	2021-10-15 21:04:04	2021-10-15 21:04:04
22	Hanspeter	Schütze	buttner.jens@example.org	2021-10-15 21:04:03	evelin90	$2y$10$wKAHKKe2hpGjxIQ8ifKt4..BtB5pNyHwRivkzerexMs8IfOOPW/4e	9fyiERRGvS	2021-10-15 21:04:04	2021-10-15 21:04:04
23	Annegret	Groß	ehlers.helen@example.org	2021-10-15 21:04:03	helga.weidner	$2y$10$TtBrm/KGlIZSJk2U83xQK.1chHzWUIEHI6j6DkLgiJRaBniAqEKvm	rDYZEaIxqP	2021-10-15 21:04:04	2021-10-15 21:04:04
24	Albert	Niemann	qschumacher@example.net	2021-10-15 21:04:04	patricia.opitz	$2y$10$xNPN6Fq8Cg8FqPsD1l6y/OnuQCofYdSGTkbDKCivgnK/4rTxjCwi.	cLA30ZZYYn	2021-10-15 21:04:04	2021-10-15 21:04:04
25	Tobias	Wetzel	hschutte@example.com	2021-10-15 21:04:04	hella.hermann	$2y$10$VRxDotSJmlJt.1ajxiQBIOqNQPRccw55suTe4ubx9TabVHo.YRmsy	kAlEhqfGjA	2021-10-15 21:04:04	2021-10-15 21:04:04
26	Alfred	Krämer	fkoch@example.com	2021-10-15 21:04:04	linda97	$2y$10$2UT10pvSw/TmDinlmwFMXuqmUqpOuDs5V7uS30MH3vRbCVvbpFTyG	61rdW40Zbh	2021-10-15 21:04:04	2021-10-15 21:04:04
27	Rupert	Schmitz	fhartwig@example.com	2021-10-15 21:04:04	beate.glaser	$2y$10$uwIhNu0C1MTpw6wNBp641OnVLUgImw5DslH9TW25C5Z1B5gR7/0.u	ojB0wmA4Vs	2021-10-15 21:04:04	2021-10-15 21:04:04
28	Guido	Benz	xahrens@example.org	2021-10-15 21:04:04	heinzjosef89	$2y$10$e4IDzYUPKUHhh4KmgIXrDurdtmYBLhkbdDH1Fceektvmkrb2Qy2lq	AOoe4hDyID	2021-10-15 21:04:04	2021-10-15 21:04:04
29	Fabian	Wieland	susan60@example.org	2021-10-15 21:04:04	neubert.jasmin	$2y$10$5UyOguwqQWszbjh60WaUHOZb61v2gpCeHL1EgJnO1oTaPTtTwjs7q	VTPe3zcxpa	2021-10-15 21:04:04	2021-10-15 21:04:04
30	Klaus Peter	Ullrich	denise94@example.net	2021-10-15 21:04:04	mschiller	$2y$10$owVupkeF.M3ahDzOpAHl6OUZV3qOHoHH0kmFnWjdIj1ytnRjSgQ4C	VpAXdLsflz	2021-10-15 21:04:04	2021-10-15 21:04:04
31	Monique	Stephan	noack.karlheinrich@example.com	2021-10-15 21:05:02	naumann.liesel	$2y$10$jQtN2yNO0D1j9CQPuHFOPu9Cndog8qBLcQS378P.MazGpgjC2Bgsq	zy1W9u6QJd	2021-10-15 21:05:03	2021-10-15 21:05:03
32	Sigrun	Neuhaus	bode.francesco@example.net	2021-10-15 21:05:02	cfreitag	$2y$10$oDIJ1q.IjUcDEA1jh0xtzuWobn6Ou70Ovxg3hxISoiciNgIrWOj8q	m3L5zhcnBM	2021-10-15 21:05:03	2021-10-15 21:05:03
33	Verena	Brunner	ludmilla.schneider@example.org	2021-10-15 21:05:02	hesse.nikola	$2y$10$IlgQtHy0X4j0pkXQAY.f.u8QfPWZOFD5tAc3Fm0RbyBKA5cc50KPW	MlSWDnt5Mx	2021-10-15 21:05:03	2021-10-15 21:05:03
34	Sören	Grimm	winter.werner@example.org	2021-10-15 21:05:02	bwolff	$2y$10$DokjaZ2sYMAjyTEGv8RrYe7ZBjcCKJpg7O.ujK.yZQD33JfwSv72G	qss1dWieWZ	2021-10-15 21:05:03	2021-10-15 21:05:03
35	Victor	Nagel	marianne03@example.com	2021-10-15 21:05:02	zimmer.hansdieter	$2y$10$LoSfsnVNAH2J1qtPD2n9pOiDsqOt.I2/Pk6EVIJIXJNeqTGGBBXkW	Ry9sJnBP5E	2021-10-15 21:05:03	2021-10-15 21:05:03
36	Elmar	Kroll	gabriel50@example.org	2021-10-15 21:05:02	witt.birgitta	$2y$10$87nmxt8AsK.oOKgiNvVTSeXZVhlxbIcvY3qXjcczCVYtv4DxZ0.y.	w3N3e1rZmH	2021-10-15 21:05:03	2021-10-15 21:05:03
37	Anna-Maria	Berger	kuno41@example.net	2021-10-15 21:05:02	ggobel	$2y$10$Da3kN58u6qxAkJnKh1849eZzOxHaPzumDHenH48cKhefio1nUZH3.	ZDB756qxEw	2021-10-15 21:05:03	2021-10-15 21:05:03
38	Henryk	Köhler	gerlinde.klemm@example.org	2021-10-15 21:05:03	zstraub	$2y$10$yjT23edJ8DlnlObSqfHdo.iUfpSyJFq3su/tQ67HZSn/AxR9WzQZ2	2JKpllB5MI	2021-10-15 21:05:03	2021-10-15 21:05:03
39	Caroline	Hahn	dorn.hanshermann@example.com	2021-10-15 21:05:03	jensuwe81	$2y$10$M4DexvS.PfovuuGDYMjOBuVNtZVr7Dk35X2hRfEBGLl.3xk4JpBya	GoNynYkPUF	2021-10-15 21:05:03	2021-10-15 21:05:03
40	Felix	Hentschel	ria.simon@example.net	2021-10-15 21:05:03	hehlers	$2y$10$1chMb7ItD/6TlV8ZhJD.f.bB3mt3uKa84AQJpVEaMIkyFlViI.sZu	edC7j0hC6A	2021-10-15 21:05:03	2021-10-15 21:05:03
41	Meinhard	Berndt	hheinemann@example.com	2021-10-15 21:05:45	fkirsch	$2y$10$fQyYzR8aXzKGSXu2E8erF.BY/LW8hf1m1aLAKa3eAevJMD2LX0.oW	IxTonV3z57	2021-10-15 21:05:46	2021-10-15 21:05:46
42	Andrej	Kroll	helena.zimmermann@example.org	2021-10-15 21:05:45	rbender	$2y$10$0dZ1h6tTu4vu0MwG0W0nY.4IZgausCokbMOt2LaPH60zfYhmvC2Pu	mUbnDXiYdJ	2021-10-15 21:05:46	2021-10-15 21:05:46
43	Kai-Uwe	Steffens	albert.ilse@example.net	2021-10-15 21:05:45	ingeborg.fuchs	$2y$10$xN0DCAJr2FvKwXMhmpqJSuNCA7DWBCYhbm4VFR59A3RED7m30qLGC	CvqVmmUYgT	2021-10-15 21:05:46	2021-10-15 21:05:46
44	Melitta	Haupt	margitta05@example.org	2021-10-15 21:05:45	janine84	$2y$10$m9LQQbZlmENb6m5XdU1Tueo5YvH3irIZBJuQdqiOfseJ/HoJ/sxhO	71kJ2V3PU0	2021-10-15 21:05:46	2021-10-15 21:05:46
45	Adolf	Stahl	heidi39@example.net	2021-10-15 21:05:45	joseph87	$2y$10$zGR7mqhsmFlgdqTgew9/ru7i3chHBe9ZIiJNe7xyMj6fqKdsKO/H.	zy42yq9dYv	2021-10-15 21:05:46	2021-10-15 21:05:46
46	Jens-Uwe	Probst	gerti16@example.com	2021-10-15 21:05:46	zsommer	$2y$10$rweTtIka8Z7lL9U84YqzqumsMMvQ06dfGJACxx.J6W7eguPtCOe6G	y3XEaM8YZa	2021-10-15 21:05:46	2021-10-15 21:05:46
47	Minna	Held	sina.jahn@example.org	2021-10-15 21:05:46	johann04	$2y$10$VjYxihmyq/vVh9zYECqPbeqGADsvU7/erZFLuIBDO3YkzQ/55HDjG	VIVB6Pnt4x	2021-10-15 21:05:46	2021-10-15 21:05:46
48	Regina	Steffen	noack.susann@example.com	2021-10-15 21:05:46	otto.harri	$2y$10$Jc1yZ07QpwEK.4CNykmJXObbp8o.yJVjy/1Du.dwzEBl.BoIEoipq	CYaxtOtjr7	2021-10-15 21:05:46	2021-10-15 21:05:46
49	Luzia	Noll	qwilhelm@example.net	2021-10-15 21:05:46	sofia26	$2y$10$OiQyWlFWCa0Wlp3bylxRtO5F8DfYDIBgJ.faDUPOSmiNl4fLepJ5K	Y1cN0w73Gz	2021-10-15 21:05:46	2021-10-15 21:05:46
50	Bert	Rapp	vollmer.hatice@example.net	2021-10-15 21:05:46	krothe	$2y$10$Frolp85fmFQrHon1KZY5/OM0QC55lPUnGmvTzrkanaRCtpVTSg9Ha	QKsOrSe370	2021-10-15 21:05:46	2021-10-15 21:05:46
3	Josefine	Scholz	steffen80@example.com	2021-10-15 20:45:35	heinzjoachim.philipp	$2y$10$2UQDHS9TihigrxKBuv2VxOk6TZ/oQhmMRGLKmJCkTa3WQOIFa6Oc2	N4tlEbfL1h286afRmcxQxkfLjmbzOHJexX5Q5ujLKnkG9VGl90M8zwL7cFmh	2021-10-15 20:45:36	2021-10-15 20:45:36
53	irmtraud	irmtraud	irmtraud.schade@example.net	\N	irmtraud	$2y$10$v.MT4aHciJnHOYlrnaX7BOCsm0bnHl99evC3bZRyI/bnT933mEG3m	\N	2021-10-15 21:35:05	2021-10-15 21:35:05
1	Claus-Dieter	Seeger	metzger.barbel@example.net	2021-10-15 20:45:35	brandl.siegmund	$2y$10$kW7qIrX1jipcUjej79nEmOdz3wuC6tz9qVehcQvS4HK45klMVm1CG	Re7OQWul1Y81zpisvOSAuwgru5hhUQ37rcVzgznj0YPQIw5a82YQFRqlLFgF	2021-10-15 20:45:36	2021-10-15 20:45:36
\.


--
-- Name: comments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.comments_id_seq', 5, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: messages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.messages_id_seq', 2, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.migrations_id_seq', 11, true);


--
-- Name: participants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.participants_id_seq', 4, true);


--
-- Name: profiles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.profiles_id_seq', 52, true);


--
-- Name: threads_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.threads_id_seq', 2, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.users_id_seq', 53, true);


--
-- Name: comments comments_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: messages messages_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: participants participants_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.participants
    ADD CONSTRAINT participants_pkey PRIMARY KEY (id);


--
-- Name: profiles profiles_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.profiles
    ADD CONSTRAINT profiles_pkey PRIMARY KEY (id);


--
-- Name: threads threads_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.threads
    ADD CONSTRAINT threads_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_username_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_unique UNIQUE (username);


--
-- Name: comments_user_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX comments_user_id_index ON public.comments USING btree (user_id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: profiles_user_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX profiles_user_id_index ON public.profiles USING btree (user_id);


--
-- Name: comments comments_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: profiles profiles_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.profiles
    ADD CONSTRAINT profiles_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

