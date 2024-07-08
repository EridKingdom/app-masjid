const kotaList = [
    {
      "id": "1001",
      "text": "KAB. LAMPUNG TENGAH"
    },
    {
      "id": "1002",
      "text": "KAB. LAMPUNG UTARA"
    },
    {
      "id": "1003",
      "text": "KAB. LAMPUNG SELATAN"
    },
    {
      "id": "1004",
      "text": "KAB. LAMPUNG BARAT"
    },
    {
      "id": "1005",
      "text": "KAB. LAMPUNG TIMUR"
    },
    {
      "id": "1006",
      "text": "KAB. MESUJI"
    },
    {
      "id": "1007",
      "text": "KAB. PESAWARAN"
    },
    {
      "id": "1008",
      "text": "KAB. PESISIR BARAT"
    },
    {
      "id": "1009",
      "text": "KAB. PRINGSEWU"
    },
    {
      "id": "1010",
      "text": "KAB. TULANG BAWANG"
    },
    {
      "id": "1011",
      "text": "KAB. TULANG BAWANG BARAT"
    },
    {
      "id": "1012",
      "text": "KAB. TANGGAMUS"
    },
    {
      "id": "1013",
      "text": "KAB. WAY KANAN"
    },
    {
      "id": "1014",
      "text": "KOTA BANDAR LAMPUNG"
    },
    {
      "id": "1015",
      "text": "KOTA METRO"
    },
    {
      "id": "1101",
      "text": "KAB. LEBAK"
    },
    {
      "id": "1102",
      "text": "KAB. PANDEGLANG"
    },
    {
      "id": "1103",
      "text": "KAB. SERANG"
    },
    {
      "id": "1104",
      "text": "KAB. TANGERANG"
    },
    {
      "id": "1105",
      "text": "KOTA CILEGON"
    },
    {
      "id": "1106",
      "text": "KOTA SERANG"
    },
    {
      "id": "1107",
      "text": "KOTA TANGERANG"
    },
    {
      "id": "1108",
      "text": "KOTA TANGERANG SELATAN"
    },
    {
      "id": "1201",
      "text": "KAB. BANDUNG"
    },
    {
      "id": "1202",
      "text": "KAB. BANDUNG BARAT"
    },
    {
      "id": "1203",
      "text": "KAB. BEKASI"
    },
    {
      "id": "1204",
      "text": "KAB. BOGOR"
    },
    {
      "id": "1205",
      "text": "KAB. CIAMIS"
    },
    {
      "id": "1206",
      "text": "KAB. CIANJUR"
    },
    {
      "id": "1207",
      "text": "KAB. CIREBON"
    },
    {
      "id": "1208",
      "text": "KAB. GARUT"
    },
    {
      "id": "1209",
      "text": "KAB. INDRAMAYU"
    },
    {
      "id": "1210",
      "text": "KAB. KARAWANG"
    },
    {
      "id": "1211",
      "text": "KAB. KUNINGAN"
    },
    {
      "id": "1212",
      "text": "KAB. MAJALENGKA"
    },
    {
      "id": "1213",
      "text": "KAB. PANGANDARAN"
    },
    {
      "id": "1214",
      "text": "KAB. PURWAKARTA"
    },
    {
      "id": "1215",
      "text": "KAB. SUBANG"
    },
    {
      "id": "1216",
      "text": "KAB. SUKABUMI"
    },
    {
      "id": "1217",
      "text": "KAB. SUMEDANG"
    },
    {
      "id": "1218",
      "text": "KAB. TASIKMALAYA"
    },
    {
      "id": "1219",
      "text": "KOTA BANDUNG"
    },
    {
      "id": "1220",
      "text": "KOTA BANJAR"
    },
    {
      "id": "1221",
      "text": "KOTA BEKASI"
    },
    {
      "id": "1222",
      "text": "KOTA BOGOR"
    },
    {
      "id": "1223",
      "text": "KOTA CIMAHI"
    },
    {
      "id": "1224",
      "text": "KOTA CIREBON"
    },
    {
      "id": "1225",
      "text": "KOTA DEPOK"
    },
    {
      "id": "1226",
      "text": "KOTA SUKABUMI"
    },
    {
      "id": "1227",
      "text": "KOTA TASIKMALAYA"
    },
    {
      "id": "1301",
      "text": "KOTA JAKARTA"
    },
    {
      "id": "1302",
      "text": "KAB. KEPULAUAN SERIBU"
    },
    {
      "id": "1401",
      "text": "KAB. BANJARNEGARA"
    },
    {
      "id": "1402",
      "text": "KAB. BANYUMAS"
    },
    {
      "id": "1403",
      "text": "KAB. BATANG"
    },
    {
      "id": "1404",
      "text": "KAB. BLORA"
    },
    {
      "id": "1405",
      "text": "KAB. BOYOLALI"
    },
    {
      "id": "1406",
      "text": "KAB. BREBES"
    },
    {
      "id": "1407",
      "text": "KAB. CILACAP"
    },
    {
      "id": "1408",
      "text": "KAB. DEMAK"
    },
    {
      "id": "1409",
      "text": "KAB. GROBOGAN"
    },
    {
      "id": "1410",
      "text": "KAB. JEPARA"
    },
    {
      "id": "1411",
      "text": "KAB. KARANGANYAR"
    },
    {
      "id": "1412",
      "text": "KAB. KEBUMEN"
    },
    {
      "id": "1413",
      "text": "KAB. KENDAL"
    },
    {
      "id": "1414",
      "text": "KAB. KLATEN"
    },
    {
      "id": "1415",
      "text": "KAB. KUDUS"
    },
    {
      "id": "1416",
      "text": "KAB. MAGELANG"
    },
    {
      "id": "1417",
      "text": "KAB. PATI"
    },
    {
      "id": "1418",
      "text": "KAB. PEKALONGAN"
    },
    {
      "id": "1419",
      "text": "KAB. PEMALANG"
    },
    {
      "id": "1420",
      "text": "KAB. PURBALINGGA"
    },
    {
      "id": "1421",
      "text": "KAB. PURWOREJO"
    },
    {
      "id": "1422",
      "text": "KAB. REMBANG"
    },
    {
      "id": "1423",
      "text": "KAB. SEMARANG"
    },
    {
      "id": "1424",
      "text": "KAB. SRAGEN"
    },
    {
      "id": "1425",
      "text": "KAB. SUKOHARJO"
    },
    {
      "id": "1426",
      "text": "KAB. TEGAL"
    },
    {
      "id": "1427",
      "text": "KAB. TEMANGGUNG"
    },
    {
      "id": "1428",
      "text": "KAB. WONOGIRI"
    },
    {
      "id": "1429",
      "text": "KAB. WONOSOBO"
    },
    {
      "id": "1430",
      "text": "KOTA MAGELANG"
    },
    {
      "id": "1431",
      "text": "KOTA PEKALONGAN"
    },
    {
      "id": "1432",
      "text": "KOTA SALATIGA"
    },
    {
      "id": "1433",
      "text": "KOTA SEMARANG"
    },
    {
      "id": "1434",
      "text": "KOTA SURAKARTA"
    },
    {
      "id": "1435",
      "text": "KOTA TEGAL"
    },
    {
      "id": "1501",
      "text": "KAB. BANTUL"
    },
    {
      "id": "1502",
      "text": "KAB. GUNUNGKIDUL"
    },
    {
      "id": "1503",
      "text": "KAB. KULON PROGO"
    },
    {
      "id": "1504",
      "text": "KAB. SLEMAN"
    },
    {
      "id": "1505",
      "text": "KOTA YOGYAKARTA"
    },
    {
      "id": "1601",
      "text": "KAB. BANGKALAN"
    },
    {
      "id": "1602",
      "text": "KAB. BANYUWANGI"
    },
    {
      "id": "1603",
      "text": "KAB. BLITAR"
    },
    {
      "id": "1604",
      "text": "KAB. BOJONEGORO"
    },
    {
      "id": "1605",
      "text": "KAB. BONDOWOSO"
    },
    {
      "id": "1606",
      "text": "KAB. GRESIK"
    },
    {
      "id": "1607",
      "text": "KAB. JEMBER"
    },
    {
      "id": "1608",
      "text": "KAB. JOMBANG"
    },
    {
      "id": "1609",
      "text": "KAB. KEDIRI"
    },
    {
      "id": "1610",
      "text": "KAB. LAMONGAN"
    },
    {
      "id": "1611",
      "text": "KAB. LUMAJANG"
    },
    {
      "id": "1612",
      "text": "KAB. MADIUN"
    },
    {
      "id": "1613",
      "text": "KAB. MAGETAN"
    },
    {
      "id": "1614",
      "text": "KAB. MALANG"
    },
    {
      "id": "1615",
      "text": "KAB. MOJOKERTO"
    },
    {
      "id": "1616",
      "text": "KAB. NGANJUK"
    },
    {
      "id": "1617",
      "text": "KAB. NGAWI"
    },
    {
      "id": "1618",
      "text": "KAB. PACITAN"
    },
    {
      "id": "1619",
      "text": "KAB. PAMEKASAN"
    },
    {
      "id": "1620",
      "text": "KAB. PASURUAN"
    },
    {
      "id": "1621",
      "text": "KAB. PONOROGO"
    },
    {
      "id": "1622",
      "text": "KAB. PROBOLINGGO"
    },
    {
      "id": "1623",
      "text": "KAB. SAMPANG"
    },
    {
      "id": "1624",
      "text": "KAB. SIDOARJO"
    },
    {
      "id": "1625",
      "text": "KAB. SITUBONDO"
    },
    {
      "id": "1626",
      "text": "KAB. SUMENEP"
    },
    {
      "id": "1627",
      "text": "KAB. TRENGGALEK"
    },
    {
      "id": "1628",
      "text": "KAB. TUBAN"
    },
    {
      "id": "1629",
      "text": "KAB. TULUNGAGUNG"
    },
    {
      "id": "1630",
      "text": "KOTA BATU"
    },
    {
      "id": "1631",
      "text": "KOTA BLITAR"
    },
    {
      "id": "1632",
      "text": "KOTA KEDIRI"
    },
    {
      "id": "1633",
      "text": "KOTA MADIUN"
    },
    {
      "id": "1634",
      "text": "KOTA MALANG"
    },
    {
      "id": "1635",
      "text": "KOTA MOJOKERTO"
    },
    {
      "id": "1636",
      "text": "KOTA PASURUAN"
    },
    {
      "id": "1637",
      "text": "KOTA PROBOLINGGO"
    },
    {
      "id": "1638",
      "text": "KOTA SURABAYA"
    },
    {
      "id": "1701",
      "text": "KAB. BADUNG"
    },
    {
      "id": "1702",
      "text": "KAB. BANGLI"
    },
    {
      "id": "1703",
      "text": "KAB. BULELENG"
    },
    {
      "id": "1704",
      "text": "KAB. GIANYAR"
    },
    {
      "id": "1705",
      "text": "KAB. JEMBRANA"
    },
    {
      "id": "1706",
      "text": "KAB. KARANGASEM"
    },
    {
      "id": "1707",
      "text": "KAB. KLUNGKUNG"
    },
    {
      "id": "1708",
      "text": "KAB. TABANAN"
    },
    {
      "id": "1709",
      "text": "KOTA DENPASAR"
    },
    {
      "id": "1801",
      "text": "KAB. BIMA"
    },
    {
      "id": "1802",
      "text": "KAB. DOMPU"
    },
    {
      "id": "1803",
      "text": "KAB. LOMBOK BARAT"
    },
    {
      "id": "1804",
      "text": "KAB. LOMBOK TENGAH"
    },
    {
      "id": "1805",
      "text": "KAB. LOMBOK TIMUR"
    },
    {
      "id": "1806",
      "text": "KAB. LOMBOK UTARA"
    },
    {
      "id": "1807",
      "text": "KAB. SUMBAWA"
    },
    {
      "id": "1808",
      "text": "KAB. SUMBAWA BARAT"
    },
    {
      "id": "1809",
      "text": "KOTA BIMA"
    },
    {
      "id": "1810",
      "text": "KOTA MATARAM"
    },
    {
      "id": "1901",
      "text": "KAB. ALOR"
    },
    {
      "id": "1902",
      "text": "KAB. BELU"
    },
    {
      "id": "1903",
      "text": "KAB. ENDE"
    },
    {
      "id": "1904",
      "text": "KAB. FLORES TIMUR"
    },
    {
      "id": "1905",
      "text": "KAB. KUPANG"
    },
    {
      "id": "1906",
      "text": "KAB. LEMBATA"
    },
    {
      "id": "1907",
      "text": "KAB. MALAKA"
    },
    {
      "id": "1908",
      "text": "KAB. MANGGARAI"
    },
    {
      "id": "1909",
      "text": "KAB. MANGGARAI BARAT"
    },
    {
      "id": "1910",
      "text": "KAB. MANGGARAI TIMUR"
    },
    {
      "id": "1911",
      "text": "KAB. NGADA"
    },
    {
      "id": "1912",
      "text": "KAB. NAGEKEO"
    },
    {
      "id": "1913",
      "text": "KAB. ROTE NDAO"
    },
    {
      "id": "1914",
      "text": "KAB. SABU RAIJUA"
    },
    {
      "id": "1915",
      "text": "KAB. SIKKA"
    },
    {
      "id": "1916",
      "text": "KAB. SUMBA BARAT"
    },
    {
      "id": "1917",
      "text": "KAB. SUMBA BARAT DAYA"
    },
    {
      "id": "1918",
      "text": "KAB. SUMBA TENGAH"
    },
    {
      "id": "1919",
      "text": "KAB. SUMBA TIMUR"
    },
    {
      "id": "1920",
      "text": "KAB. TIMOR TENGAH SELATAN"
    },
    {
      "id": "1921",
      "text": "KAB. TIMOR TENGAH UTARA"
    },
    {
      "id": "1922",
      "text": "KOTA KUPANG"
    },
    {
      "id": "2001",
      "text": "KAB. BENGKAYANG"
    },
    {
      "id": "2002",
      "text": "KAB. KAPUAS HULU"
    },
    {
      "id": "2003",
      "text": "KAB. KAYONG UTARA"
    },
    {
      "id": "2004",
      "text": "KAB. KETAPANG"
    },
    {
      "id": "2005",
      "text": "KAB. KUBU RAYA"
    },
    {
      "id": "2006",
      "text": "KAB. LANDAK"
    },
    {
      "id": "2007",
      "text": "KAB. MELAWI"
    },
    {
      "id": "2008",
      "text": "KAB. MEMPAWAH"
    },
    {
      "id": "2009",
      "text": "KAB. SAMBAS"
    },
    {
      "id": "2010",
      "text": "KAB. SANGGAU"
    },
    {
      "id": "2011",
      "text": "KAB. SEKADAU"
    },
    {
      "id": "2012",
      "text": "KAB. SINTANG"
    },
    {
      "id": "2013",
      "text": "KOTA PONTIANAK"
    },
    {
      "id": "2014",
      "text": "KOTA SINGKAWANG"
    },
    {
      "id": "2101",
      "text": "KAB. BALANGAN"
    },
    {
      "id": "2102",
      "text": "KAB. BANJAR"
    },
    {
      "id": "2103",
      "text": "KAB. BARITO KUALA"
    },
    {
      "id": "2104",
      "text": "KAB. HULU SUNGAI SELATAN"
    },
    {
      "id": "2105",
      "text": "KAB. HULU SUNGAI TENGAH"
    },
    {
      "id": "2106",
      "text": "KAB. HULU SUNGAI UTARA"
    },
    {
      "id": "2107",
      "text": "KAB. KOTABARU"
    },
    {
      "id": "2108",
      "text": "KAB. TABALONG"
    },
    {
      "id": "2109",
      "text": "KAB. TANAH BUMBU"
    },
    {
      "id": "2110",
      "text": "KAB. TANAH LAUT"
    },
    {
      "id": "2111",
      "text": "KAB. TAPIN"
    },
    {
      "id": "2112",
      "text": "KOTA BANJARBARU"
    },
    {
      "id": "2113",
      "text": "KOTA BANJARMASIN"
    },
    {
      "id": "2201",
      "text": "KAB. BARITO SELATAN"
    },
    {
      "id": "2202",
      "text": "KAB. BARITO TIMUR"
    },
    {
      "id": "2203",
      "text": "KAB. BARITO UTARA"
    },
    {
      "id": "2204",
      "text": "KAB. GUNUNG MAS"
    },
    {
      "id": "2205",
      "text": "KAB. KAPUAS"
    },
    {
      "id": "2206",
      "text": "KAB. KATINGAN"
    },
    {
      "id": "2207",
      "text": "KAB. KOTAWARINGIN BARAT"
    },
    {
      "id": "2208",
      "text": "KAB. KOTAWARINGIN TIMUR"
    },
    {
      "id": "2209",
      "text": "KAB. LAMANDAU"
    },
    {
      "id": "2210",
      "text": "KAB. MURUNG RAYA"
    },
    {
      "id": "2211",
      "text": "KAB. PULANG PISAU"
    },
    {
      "id": "2212",
      "text": "KAB. SUKAMARA"
    },
    {
      "id": "2213",
      "text": "KAB. SERUYAN"
    },
    {
      "id": "2214",
      "text": "KOTA PALANGKARAYA"
    },
    {
      "id": "2301",
      "text": "KAB. BERAU"
    },
    {
      "id": "2302",
      "text": "KAB. KUTAI BARAT"
    },
    {
      "id": "2303",
      "text": "KAB. KUTAI KARTANEGARA"
    },
    {
      "id": "2304",
      "text": "KAB. KUTAI TIMUR"
    },
    {
      "id": "2305",
      "text": "KAB. MAHAKAM ULU"
    },
    {
      "id": "2306",
      "text": "KAB. PASER"
    },
    {
      "id": "2307",
      "text": "KAB. PENAJAM PASER UTARA"
    },
    {
      "id": "2308",
      "text": "KOTA BALIKPAPAN"
    },
    {
      "id": "2309",
      "text": "KOTA BONTANG"
    },
    {
      "id": "2310",
      "text": "KOTA SAMARINDA"
    },
    {
      "id": "2401",
      "text": "KAB. BULUNGAN"
    },
    {
      "id": "2402",
      "text": "KAB. MALINAU"
    },
    {
      "id": "2403",
      "text": "KAB. NUNUKAN"
    },
    {
      "id": "2404",
      "text": "KAB. TANA TIDUNG"
    },
    {
      "id": "2405",
      "text": "KOTA TARAKAN"
    },
    {
      "id": "2501",
      "text": "KAB. BOALEMO"
    },
    {
      "id": "2502",
      "text": "KAB. BONE BOLANGO"
    },
    {
      "id": "2503",
      "text": "KAB. GORONTALO"
    },
    {
      "id": "2504",
      "text": "KAB. GORONTALO UTARA"
    },
    {
      "id": "2505",
      "text": "KAB. POHUWATO"
    },
    {
      "id": "2506",
      "text": "KOTA GORONTALO"
    },
    {
      "id": "2601",
      "text": "KAB. BANTAENG"
    },
    {
      "id": "2602",
      "text": "KAB. BARRU"
    },
    {
      "id": "2603",
      "text": "KAB. BONE"
    },
    {
      "id": "2604",
      "text": "KAB. BULUKUMBA"
    },
    {
      "id": "2605",
      "text": "KAB. ENREKANG"
    },
    {
      "id": "2606",
      "text": "KAB. GOWA"
    },
    {
      "id": "2607",
      "text": "KAB. JENEPONTO"
    },
    {
      "id": "2608",
      "text": "KAB. KEPULAUAN SELAYAR"
    },
    {
      "id": "2609",
      "text": "KAB. LUWU"
    },
    {
      "id": "2610",
      "text": "KAB. LUWU TIMUR"
    },
    {
      "id": "2611",
      "text": "KAB. LUWU UTARA"
    },
    {
      "id": "2612",
      "text": "KAB. MAROS"
    },
    {
      "id": "2613",
      "text": "KAB. PANGKAJENE DAN KEPULAUAN"
    },
    {
      "id": "2614",
      "text": "KAB. PINRANG"
    },
    {
      "id": "2615",
      "text": "KAB. SIDENRENG RAPPANG"
    },
    {
      "id": "2616",
      "text": "KAB. SINJAI"
    },
    {
      "id": "2617",
      "text": "KAB. SOPPENG"
    },
    {
      "id": "2618",
      "text": "KAB. TAKALAR"
    },
    {
      "id": "2619",
      "text": "KAB. TANA TORAJA"
    },
    {
      "id": "2620",
      "text": "KAB. TORAJA UTARA"
    },
    {
      "id": "2621",
      "text": "KAB. WAJO"
    },
    {
      "id": "2622",
      "text": "KOTA MAKASSAR"
    },
    {
      "id": "2623",
      "text": "KOTA PALOPO"
    },
    {
      "id": "2624",
      "text": "KOTA PAREPARE"
    },
    {
      "id": "2701",
      "text": "KAB. BOMBANA"
    },
    {
      "id": "2702",
      "text": "KAB. BUTON"
    },
    {
      "id": "2703",
      "text": "KAB. BUTON SELATAN"
    },
    {
      "id": "2704",
      "text": "KAB. BUTON TENGAH"
    },
    {
      "id": "2705",
      "text": "KAB. BUTON UTARA"
    },
    {
      "id": "2706",
      "text": "KAB. KOLAKA"
    },
    {
      "id": "2707",
      "text": "KAB. KOLAKA TIMUR"
    },
    {
      "id": "2708",
      "text": "KAB. KOLAKA UTARA"
    },
    {
      "id": "2709",
      "text": "KAB. KONAWE"
    },
    {
      "id": "2710",
      "text": "KAB. KONAWE KEPULAUAN"
    },
    {
      "id": "2711",
      "text": "KAB. KONAWE SELATAN"
    },
    {
      "id": "2712",
      "text": "KAB. KONAWE UTARA"
    },
    {
      "id": "2713",
      "text": "KAB. MUNA"
    },
    {
      "id": "2714",
      "text": "KAB. MUNA BARAT"
    },
    {
      "id": "2715",
      "text": "KAB. WAKATOBI"
    },
    {
      "id": "2716",
      "text": "KOTA BAU-BAU"
    },
    {
      "id": "2717",
      "text": "KOTA KENDARI"
    },
    {
      "id": "2801",
      "text": "KAB. BANGGAI"
    },
    {
      "id": "2802",
      "text": "KAB. BANGGAI KEPULAUAN"
    },
    {
      "id": "2803",
      "text": "KAB. BANGGAI LAUT"
    },
    {
      "id": "2804",
      "text": "KAB. BUOL"
    },
    {
      "id": "2805",
      "text": "KAB. DONGGALA"
    },
    {
      "id": "2806",
      "text": "KAB. MOROWALI"
    },
    {
      "id": "2807",
      "text": "KAB. MOROWALI UTARA"
    },
    {
      "id": "2808",
      "text": "KAB. PARIGI MOUTONG"
    },
    {
      "id": "2809",
      "text": "KAB. POSO"
    },
    {
      "id": "2810",
      "text": "KAB. SIGI"
    },
    {
      "id": "2811",
      "text": "KAB. TOJO UNA-UNA"
    },
    {
      "id": "2812",
      "text": "KAB. TOLI-TOLI"
    },
    {
      "id": "2813",
      "text": "KOTA PALU"
    },
    {
      "id": "2901",
      "text": "KAB. BOLAANG MONGONDOW"
    },
    {
      "id": "2902",
      "text": "KAB. BOLAANG MONGONDOW SELATAN"
    },
    {
      "id": "2903",
      "text": "KAB. BOLAANG MONGONDOW TIMUR"
    },
    {
      "id": "2904",
      "text": "KAB. BOLAANG MONGONDOW UTARA"
    },
    {
      "id": "2905",
      "text": "KAB. KEPULAUAN SANGIHE"
    },
    {
      "id": "2906",
      "text": "KAB. KEPULAUAN SIAU TAGULANDANG BIARO"
    },
    {
      "id": "2907",
      "text": "KAB. KEPULAUAN TALAUD"
    },
    {
      "id": "2908",
      "text": "KAB. MINAHASA"
    },
    {
      "id": "2909",
      "text": "KAB. MINAHASA SELATAN"
    },
    {
      "id": "2910",
      "text": "KAB. MINAHASA TENGGARA"
    },
    {
      "id": "2911",
      "text": "KAB. MINAHASA UTARA"
    },
    {
      "id": "2912",
      "text": "KOTA BITUNG"
    },
    {
      "id": "2913",
      "text": "KOTA KOTAMOBAGU"
    },
    {
      "id": "2914",
      "text": "KOTA MANADO"
    },
    {
      "id": "2915",
      "text": "KOTA TOMOHON"
    },
    {
      "id": "3001",
      "text": "KAB. MAJENE"
    },
    {
      "id": "3002",
      "text": "KAB. MAMASA"
    },
    {
      "id": "3003",
      "text": "KAB. MAMUJU"
    },
    {
      "id": "3004",
      "text": "KAB. MAMUJU TENGAH"
    },
    {
      "id": "3005",
      "text": "KAB. MAMUJU UTARA"
    },
    {
      "id": "3006",
      "text": "KAB. POLEWALI MANDAR"
    },
    {
      "id": "3101",
      "text": "KAB. BURU"
    },
    {
      "id": "3102",
      "text": "KAB. BURU SELATAN"
    },
    {
      "id": "3103",
      "text": "KAB. KEPULAUAN ARU"
    },
    {
      "id": "3104",
      "text": "KAB. MALUKU BARAT DAYA"
    },
    {
      "id": "3105",
      "text": "KAB. MALUKU TENGAH"
    },
    {
      "id": "3106",
      "text": "KAB. MALUKU TENGGARA"
    },
    {
      "id": "3107",
      "text": "KAB. MALUKU TENGGARA BARAT"
    },
    {
      "id": "3108",
      "text": "KAB. SERAM BAGIAN BARAT"
    },
    {
      "id": "3109",
      "text": "KAB. SERAM BAGIAN TIMUR"
    },
    {
      "id": "3110",
      "text": "KOTA AMBON"
    },
    {
      "id": "3111",
      "text": "KOTA TUAL"
    },
    {
      "id": "3201",
      "text": "KAB. HALMAHERA BARAT"
    },
    {
      "id": "3202",
      "text": "KAB. HALMAHERA TENGAH"
    },
    {
      "id": "3203",
      "text": "KAB. HALMAHERA UTARA"
    },
    {
      "id": "3204",
      "text": "KAB. HALMAHERA SELATAN"
    },
    {
      "id": "3205",
      "text": "KAB. KEPULAUAN SULA"
    },
    {
      "id": "3206",
      "text": "KAB. HALMAHERA TIMUR"
    },
    {
      "id": "3207",
      "text": "KAB. PULAU MOROTAI"
    },
    {
      "id": "3208",
      "text": "KAB. PULAU TALIABU"
    },
    {
      "id": "3209",
      "text": "KOTA TERNATE"
    },
    {
      "id": "3210",
      "text": "KOTA TIDORE KEPULAUAN"
    },
    {
      "id": "3211",
      "text": "KOTA SOFIFI"
    },
    {
      "id": "3212",
      "text": "KOTA SOFIFI"
    },
    {
      "id": "3301",
      "text": "KAB. ASMAT"
    },
    {
      "id": "3302",
      "text": "KAB. BIAK NUMFOR"
    },
    {
      "id": "3303",
      "text": "KAB. BOVEN DIGOEL"
    },
    {
      "id": "3304",
      "text": "KAB. DEIYAI"
    },
    {
      "id": "3305",
      "text": "KAB. DOGIYAI"
    },
    {
      "id": "3306",
      "text": "KAB. INTAN JAYA"
    },
    {
      "id": "3307",
      "text": "KAB. JAYAPURA"
    },
    {
      "id": "3308",
      "text": "KAB. JAYAWIJAYA"
    },
    {
      "id": "3309",
      "text": "KAB. KEEROM"
    },
    {
      "id": "3310",
      "text": "KAB. KEPULAUAN YAPEN"
    },
    {
      "id": "3311",
      "text": "KAB. LANNY JAYA"
    },
    {
      "id": "3312",
      "text": "KAB. MAMBERAMO RAYA"
    },
    {
      "id": "3313",
      "text": "KAB. MAMBERAMO TENGAH"
    },
    {
      "id": "3314",
      "text": "KAB. MAPPI"
    },
    {
      "id": "3315",
      "text": "KAB. MERAUKE"
    },
    {
      "id": "3316",
      "text": "KAB. MIMIKA"
    },
    {
      "id": "3317",
      "text": "KAB. NABIRE"
    },
    {
      "id": "3318",
      "text": "KAB. NDUGA"
    },
    {
      "id": "3319",
      "text": "KAB. PANIAI"
    },
    {
      "id": "3320",
      "text": "KAB. PEGUNUNGAN BINTANG"
    },
    {
      "id": "3321",
      "text": "KAB. PUNCAK"
    },
    {
      "id": "3322",
      "text": "KAB. PUNCAK JAYA"
    },
    {
      "id": "3323",
      "text": "KAB. SARMI"
    },
    {
      "id": "3324",
      "text": "KAB. SUPIORI"
    },
    {
      "id": "3325",
      "text": "KAB. TOLIKARA"
    },
    {
      "id": "3326",
      "text": "KAB. WAROPEN"
    },
    {
      "id": "3327",
      "text": "KAB. YAHUKIMO"
    },
    {
      "id": "3328",
      "text": "KAB. YALIMO"
    },
    {
      "id": "3329",
      "text": "KOTA JAYAPURA"
    },
    {
      "id": "3330",
      "text": "KAB. YAPEN WAROPEN"
    },
    {
      "id": "3401",
      "text": "KAB. FAKFAK"
    },
    {
      "id": "3402",
      "text": "KAB. KAIMANA"
    },
    {
      "id": "3403",
      "text": "KAB. MANOKWARI"
    },
    {
      "id": "3404",
      "text": "KAB. MANOKWARI SELATAN"
    },
    {
      "id": "3405",
      "text": "KAB. MAYBRAT"
    },
    {
      "id": "3406",
      "text": "KAB. PEGUNUNGAN ARFAK"
    },
    {
      "id": "3407",
      "text": "KAB. RAJA AMPAT"
    },
    {
      "id": "3408",
      "text": "KAB. SORONG"
    },
    {
      "id": "3409",
      "text": "KAB. SORONG SELATAN"
    },
    {
      "id": "3410",
      "text": "KAB. TAMBRAUW"
    },
    {
      "id": "3411",
      "text": "KAB. TELUK BINTUNI"
    },
    {
      "id": "3412",
      "text": "KAB. TELUK WONDAMA"
    },
    {
      "id": "3413",
      "text": "KOTA SORONG"
    },
    {
      "id": "0101",
      "text": "KAB. ACEH BARAT"
    },
    {
      "id": "0102",
      "text": "KAB. ACEH BARAT DAYA"
    },
    {
      "id": "0103",
      "text": "KAB. ACEH BESAR"
    },
    {
      "id": "0104",
      "text": "KAB. ACEH JAYA"
    },
    {
      "id": "0105",
      "text": "KAB. ACEH SELATAN"
    },
    {
      "id": "0106",
      "text": "KAB. ACEH SINGKIL"
    },
    {
      "id": "0107",
      "text": "KAB. ACEH TAMIANG"
    },
    {
      "id": "0108",
      "text": "KAB. ACEH TENGAH"
    },
    {
      "id": "0109",
      "text": "KAB. ACEH TENGGARA"
    },
    {
      "id": "0110",
      "text": "KAB. ACEH TIMUR"
    },
    {
      "id": "0111",
      "text": "KAB. ACEH UTARA"
    },
    {
      "id": "0112",
      "text": "KAB. BENER MERIAH"
    },
    {
      "id": "0113",
      "text": "KAB. BIREUEN"
    },
    {
      "id": "0114",
      "text": "KAB. GAYO LUES"
    },
    {
      "id": "0115",
      "text": "KAB. NAGAN RAYA"
    },
    {
      "id": "0116",
      "text": "KAB. PIDIE"
    },
    {
      "id": "0117",
      "text": "KAB. PIDIE JAYA"
    },
    {
      "id": "0118",
      "text": "KAB. SIMEULUE"
    },
    {
      "id": "0119",
      "text": "KOTA BANDA ACEH"
    },
    {
      "id": "0120",
      "text": "KOTA LANGSA"
    },
    {
      "id": "0121",
      "text": "KOTA LHOKSEUMAWE"
    },
    {
      "id": "0122",
      "text": "KOTA SABANG"
    },
    {
      "id": "0123",
      "text": "KOTA SUBULUSSALAM"
    },
    {
      "id": "0201",
      "text": "KAB. ASAHAN"
    },
    {
      "id": "0202",
      "text": "KAB. BATUBARA"
    },
    {
      "id": "0203",
      "text": "KAB. DAIRI"
    },
    {
      "id": "0204",
      "text": "KAB. DELI SERDANG"
    },
    {
      "id": "0205",
      "text": "KAB. HUMBANG HASUNDUTAN"
    },
    {
      "id": "0206",
      "text": "KAB. KARO"
    },
    {
      "id": "0207",
      "text": "KAB. LABUHANBATU"
    },
    {
      "id": "0208",
      "text": "KAB. LABUHANBATU SELATAN"
    },
    {
      "id": "0209",
      "text": "KAB. LABUHANBATU UTARA"
    },
    {
      "id": "0210",
      "text": "KAB. LANGKAT"
    },
    {
      "id": "0211",
      "text": "KAB. MANDAILING NATAL"
    },
    {
      "id": "0212",
      "text": "KAB. NIAS"
    },
    {
      "id": "0213",
      "text": "KAB. NIAS BARAT"
    },
    {
      "id": "0214",
      "text": "KAB. NIAS SELATAN"
    },
    {
      "id": "0215",
      "text": "KAB. NIAS UTARA"
    },
    {
      "id": "0216",
      "text": "KAB. PADANG LAWAS"
    },
    {
      "id": "0217",
      "text": "KAB. PADANG LAWAS UTARA"
    },
    {
      "id": "0218",
      "text": "KAB. PAKPAK BHARAT"
    },
    {
      "id": "0219",
      "text": "KAB. SAMOSIR"
    },
    {
      "id": "0220",
      "text": "KAB. SERDANG BEDAGAI"
    },
    {
      "id": "0221",
      "text": "KAB. SIMALUNGUN"
    },
    {
      "id": "0222",
      "text": "KAB. TAPANULI SELATAN"
    },
    {
      "id": "0223",
      "text": "KAB. TAPANULI TENGAH"
    },
    {
      "id": "0224",
      "text": "KAB. TAPANULI UTARA"
    },
    {
      "id": "0225",
      "text": "KAB. TOBA SAMOSIR"
    },
    {
      "id": "0226",
      "text": "KOTA BINJAI"
    },
    {
      "id": "0227",
      "text": "KOTA GUNUNGSITOLI"
    },
    {
      "id": "0228",
      "text": "KOTA MEDAN"
    },
    {
      "id": "0229",
      "text": "KOTA PADANGSIDEMPUAN"
    },
    {
      "id": "0230",
      "text": "KOTA PEMATANGSIANTAR"
    },
    {
      "id": "0231",
      "text": "KOTA SIBOLGA"
    },
    {
      "id": "0232",
      "text": "KOTA TANJUNGBALAI"
    },
    {
      "id": "0233",
      "text": "KOTA TEBING TINGGI"
    },
    {
      "id": "0301",
      "text": "KAB. AGAM"
    },
    {
      "id": "0302",
      "text": "KAB. DHARMASRAYA"
    },
    {
      "id": "0303",
      "text": "KAB. KEPULAUAN MENTAWAI"
    },
    {
      "id": "0304",
      "text": "KAB. LIMA PULUH KOTA"
    },
    {
      "id": "0305",
      "text": "KAB. PADANG PARIAMAN"
    },
    {
      "id": "0306",
      "text": "KAB. PASAMAN"
    },
    {
      "id": "0307",
      "text": "KAB. PASAMAN BARAT"
    },
    {
      "id": "0308",
      "text": "KAB. PESISIR SELATAN"
    },
    {
      "id": "0309",
      "text": "KAB. SIJUNJUNG"
    },
    {
      "id": "0310",
      "text": "KAB. SOLOK"
    },
    {
      "id": "0311",
      "text": "KAB. SOLOK SELATAN"
    },
    {
      "id": "0312",
      "text": "KAB. TANAH DATAR"
    },
    {
      "id": "0313",
      "text": "KOTA BUKITTINGGI"
    },
    {
      "id": "0314",
      "text": "KOTA PADANG",
      "selected": true
    },
    {
      "id": "0315",
      "text": "KOTA PADANGPANJANG"
    },
    {
      "id": "0316",
      "text": "KOTA PARIAMAN"
    },
    {
      "id": "0317",
      "text": "KOTA PAYAKUMBUH"
    },
    {
      "id": "0318",
      "text": "KOTA SAWAHLUNTO"
    },
    {
      "id": "0319",
      "text": "KOTA SOLOK"
    },
    {
      "id": "0401",
      "text": "KAB. BENGKALIS"
    },
    {
      "id": "0402",
      "text": "KAB. INDRAGIRI HILIR"
    },
    {
      "id": "0403",
      "text": "KAB. INDRAGIRI HULU"
    },
    {
      "id": "0404",
      "text": "KAB. KAMPAR"
    },
    {
      "id": "0405",
      "text": "KAB. KEPULAUAN MERANTI"
    },
    {
      "id": "0406",
      "text": "KAB. KUANTAN SINGINGI"
    },
    {
      "id": "0407",
      "text": "KAB. PELALAWAN"
    },
    {
      "id": "0408",
      "text": "KAB. ROKAN HILIR"
    },
    {
      "id": "0409",
      "text": "KAB. ROKAN HULU"
    },
    {
      "id": "0410",
      "text": "KAB. SIAK"
    },
    {
      "id": "0411",
      "text": "KOTA DUMAI"
    },
    {
      "id": "0412",
      "text": "KOTA PEKANBARU"
    },
    {
      "id": "0501",
      "text": "KAB. BINTAN"
    },
    {
      "id": "0502",
      "text": "KAB. KARIMUN"
    },
    {
      "id": "0503",
      "text": "KAB. KEPULAUAN ANAMBAS"
    },
    {
      "id": "0504",
      "text": "KAB. LINGGA"
    },
    {
      "id": "0505",
      "text": "KAB. NATUNA"
    },
    {
      "id": "0506",
      "text": "KOTA BATAM"
    },
    {
      "id": "0507",
      "text": "KOTA TANJUNG PINANG"
    },
    {
      "id": "0508",
      "text": "PULAU TAMBELAN KAB. BINTAN"
    },
    {
      "id": "0509",
      "text": "PEKAJANG KAB. LINGGA"
    },
    {
      "id": "0510",
      "text": "PULAU SERASAN KAB. NATUNA"
    },
    {
      "id": "0511",
      "text": "PULAU MIDAI KAB. NATUNA"
    },
    {
      "id": "0512",
      "text": "PULAU LAUT KAB. NATUNA"
    },
    {
      "id": "0601",
      "text": "KAB. BATANGHARI"
    },
    {
      "id": "0602",
      "text": "KAB. BUNGO"
    },
    {
      "id": "0603",
      "text": "KAB. KERINCI"
    },
    {
      "id": "0604",
      "text": "KAB. MERANGIN"
    },
    {
      "id": "0605",
      "text": "KAB. MUARO JAMBI"
    },
    {
      "id": "0606",
      "text": "KAB. SAROLANGUN"
    },
    {
      "id": "0607",
      "text": "KAB. TANJUNG JABUNG BARAT"
    },
    {
      "id": "0608",
      "text": "KAB. TANJUNG JABUNG TIMUR"
    },
    {
      "id": "0609",
      "text": "KAB. TEBO"
    },
    {
      "id": "0610",
      "text": "KOTA JAMBI"
    },
    {
      "id": "0611",
      "text": "KOTA SUNGAI PENUH"
    },
    {
      "id": "0701",
      "text": "KAB. BENGKULU SELATAN"
    },
    {
      "id": "0702",
      "text": "KAB. BENGKULU TENGAH"
    },
    {
      "id": "0703",
      "text": "KAB. BENGKULU UTARA"
    },
    {
      "id": "0704",
      "text": "KAB. KAUR"
    },
    {
      "id": "0705",
      "text": "KAB. KEPAHIANG"
    },
    {
      "id": "0706",
      "text": "KAB. LEBONG"
    },
    {
      "id": "0707",
      "text": "KAB. MUKOMUKO"
    },
    {
      "id": "0708",
      "text": "KAB. REJANG LEBONG"
    },
    {
      "id": "0709",
      "text": "KAB. SELUMA"
    },
    {
      "id": "0710",
      "text": "KOTA BENGKULU"
    },
    {
      "id": "0801",
      "text": "KAB. BANYUASIN"
    },
    {
      "id": "0802",
      "text": "KAB. EMPAT LAWANG"
    },
    {
      "id": "0803",
      "text": "KAB. LAHAT"
    },
    {
      "id": "0804",
      "text": "KAB. MUARA ENIM"
    },
    {
      "id": "0805",
      "text": "KAB. MUSI BANYUASIN"
    },
    {
      "id": "0806",
      "text": "KAB. MUSI RAWAS"
    },
    {
      "id": "0807",
      "text": "KAB. MUSI RAWAS UTARA"
    },
    {
      "id": "0808",
      "text": "KAB. OGAN ILIR"
    },
    {
      "id": "0809",
      "text": "KAB. OGAN KOMERING ILIR"
    },
    {
      "id": "0810",
      "text": "KAB. OGAN KOMERING ULU"
    },
    {
      "id": "0811",
      "text": "KAB. OGAN KOMERING ULU SELATAN"
    },
    {
      "id": "0812",
      "text": "KAB. OGAN KOMERING ULU TIMUR"
    },
    {
      "id": "0813",
      "text": "KAB. PENUKAL ABAB LEMATANG ILIR"
    },
    {
      "id": "0814",
      "text": "KOTA LUBUKLINGGAU"
    },
    {
      "id": "0815",
      "text": "KOTA PAGAR ALAM"
    },
    {
      "id": "0816",
      "text": "KOTA PALEMBANG"
    },
    {
      "id": "0817",
      "text": "KOTA PRABUMULIH"
    },
    {
      "id": "0901",
      "text": "KAB. BANGKA"
    },
    {
      "id": "0902",
      "text": "KAB. BANGKA BARAT"
    },
    {
      "id": "0903",
      "text": "KAB. BANGKA SELATAN"
    },
    {
      "id": "0904",
      "text": "KAB. BANGKA TENGAH"
    },
    {
      "id": "0905",
      "text": "KAB. BELITUNG"
    },
    {
      "id": "0906",
      "text": "KAB. BELITUNG TIMUR"
    },
    {
      "id": "0907",
      "text": "KOTA PANGKAL PINANG"
    }
  ];
  