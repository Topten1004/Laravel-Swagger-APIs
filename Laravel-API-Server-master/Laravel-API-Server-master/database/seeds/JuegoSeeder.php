<?php

use Illuminate\Database\Seeder;
use App\Models\Juego;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class JuegoSeeder extends Seeder
{
    /**
     ** Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('juegos')->truncate();

        //FILE JSON
        $json = File::get("database/data/juegos.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          Juego::create(array(
            'nombre' => $obj->nombre,
            'fecha' => $obj->fecha,
            'descripcion' => $obj->descripcion,
            'slug' => $obj->slug,
          ));
        }

        //SEEDERS
        /*DB::table('juegos')->insert([
            'nombre' => 'Rainbow Six: Siege',
            'descripcion' => 'Tom Clancys Rainbow Six Siege supone la vuelta de la saga de juegos de acción táctica en primera persona. En Rainbow Six Siege, volvemos a encarnar al famoso grupo de élite de acción táctica, e incluso a los terroristas si optamos por ello. El juego invita al conocimiento de cada facción, y por primera vez en la saga, entraremos en una profunda faceta multijugador de 5 contra 5 jugadores en el que cada usuario tendrá un papel específico en el equipo, y en el cual los mapas y escenarios, nos obligarán a adecuar nuestras estrategias de forma pormenorizada.',
            //'desarrolladora' => '1',
            'fecha' => '2015-12-01', 
            'slug' => 'rainbow-six-siege',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Days gone',
            'descripcion' => 'Days Gone es el videojuego de acción, zombies y supervivencia en mundo abierto exclusivo para PlayStation 4 desarrollado por Bend Studio. Nos invitará, encarnando al motero Deacon St. John, a sobrevivir en un escenario rural y desolado ambientado en la época actual plagado de voraces seres infectados por un misterioso virus.',
            //'desarrolladora' => '2',
            'fecha' => '2019-04-26', 
            'slug' => 'days-gone',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Battlefield 1',
            'descripcion' => 'Battlefield 1, es una nueva entrega de la saga emblemática saga de acción en primera persona, que en esta ocasión estará ambientado en la Primera Guerra Mundial. El título, gracias al motor gráfico Frostbite, ofrecerá una perspectiva realista del conflicto que asoló el mundo a comienzos del siglo pasado, invitándonos a combatir en algunos escenarios de Francia o el norte de África. Una vez más, Battlefield 1 potenciará el uso de vehículos, como carros blindados, aviones y dirigibles, diversos modos de juego, un gran componente online gracias a las batallas masivas de hasta 64 jugadores y un novedoso sistema de tiempo y climatología que dinamizará las partidas en todo momento.',
            //'desarrolladora' => '3',
            'fecha' => '2016-10-21', 
            'slug' => 'battlefield-1',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Crash Bandicoot N Sane Trilogy',
            'descripcion' => 'Crash Bandicoot N Sane Trilogy es un videojuego de plataformas en 3D, desarrollado por el estudio Vicarious Visions y producido y distribuido por activision. Se trata de una remasterización de los tres primeros juegos de la serie Crash Bandicoot aparecidos en la consola PlayStation a finales de los 90 y desarrollados por Naughty Dog, pero mejorados con gráficos totalmente renovados, cambios estéticos y ciertas novedades jugables.',
            //'desarrolladora' => '4',
            'fecha' => '2017-06-30', 
            'slug' => 'crash-bandicoot-n-sane-trilogy',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Shadow of the Colossus',
            'descripcion' => 'Este remake del juego original de PS2, creado por el Team ICO y aclamado por la crítica y los jugadores a partes iguales, nos llevará a un mundo casi sin vida, y nos hará vivir una experiencia totalmente nueva debido a un mejor rendimiento y gráficos en HD totalmente renovados. En esta inhóspita tierra y encarnando el papel de Wander, nuestro protagonista tendremos que recorrer el mundo en busca de los 16 colosos para poder salvar a mono, una chica sumida en un interminable sueño que solo se despertará con la muerte de los colosos de piedra.',
            //'desarrolladora' => '5',
            'fecha' => '2018-02-17', 
            'slug' => 'shadow-of-the-colossus',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Dark Souls Remastered',
            'descripcion' => 'Dark Souls vuelve a sus orígenes, a la primera entrega de la saga, con una edición remasterizada y mejorada del videojuego de acción y rol de culto. Se trata de una puesta al día de uno de los títulos más influyentes de los últimos años, siendo adaptado en gráficos, iluminación y modos de juego, e incluyendo en la propuesta la expansión Artorias of the Abyss devolviendo a una generación de jugadores una de las propuestas más sólidas e importantes de los últimos años.',
            //'desarrolladora' => '6',
            'fecha' => '2018-05-24', 
            'slug' => 'dark-souls-remastered',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'DOOM ETERNAL',
            'descripcion' => 'DOOM Eternal es la secuela del éxito de 2016, DOOM. Ahondando de nuevo en las raíces clásicas del género de acción en primera persona, la segunda parte desarrollada por id Software y Bethesda sigue apostando por la guerra sin cuartel contra los demonios.',
            //'desarrolladora' => '7',
            'fecha' => '2020-03-20', 
            'slug' => 'doom-eternal',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Grand Theft Auto V',
            'descripcion' => 'És un videojuego de acción-aventura de mundo abierto desarrollado por el estudio Rockstar North y distribuido por Rockstar Games.',
            //'desarrolladora' => '8',
            'fecha' => '2013-09-13', 
            'slug' => 'grand-theft-auto-v',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Bloodborne',
            'descripcion' => 'Bloodborne es un juego exclusivo de From Software, diseñado por Hidetaka Miyazaki, creador de Dark Souls y Demons Souls. Como éstos, es un título de acción y rol en el que priman los enfrentamientos contra complicados enemigos que nos pondrán en apuros. La ambientación es entre gótica y apocalíptica, llevándonos a un mundo steampunk con armas de fuego y criaturas fantásticas.',
            //'desarrolladora' => '6',
            'fecha' => '2015-03-24', 
            'slug' => 'bloodborne',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Spyro Reignited Trilogy',
            'descripcion' => 'Spyro: Reignited Trilogy es el nuevo juego remasterizado y rehecho desde cero de la clásica trilogía de videojuegos de plataformas en tres dimensiones de Spyro lanzados originalmente para la primera consola PlayStation. Gracias a Activision y Toys for Bob, este nuevo título nos presentará en gráficos de Alta Definición los tres primeros juegos del dragón morado.',
            //'desarrolladora' => '9',
            'fecha' => '2018-11-13',
            'slug' => 'spyro-reignited-trilogy', 
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Zombie Army Trilogy',
            'descripcion' => 'Zombie Army Trilogy es un recopilatorio de todos los juegos de Sniper Elite: Nazi Zombie Army. En ellos nos sumergimos en el inframundo con la obligación de hacer frente a oleadas de zombis nazis comandadas por un Hitler zombificado. Incluye campaña para un solo jugador y cooperativa.',
            //'desarrolladora' => '10',
            'fecha' => '2015-03-15', 
            'slug' => 'zombie-army-trilogy',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Cuphead',
            'descripcion' => 'Cuphead es un videojuego de plataformas de scroll lateral en 2D de tipo shot em up ya que se pueden recolectar poderes y modificarlos.',
            //'desarrolladora' => '11',
            'fecha' => '2017-09-29', 
            'slug' => 'cuphead',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Halo 3',
            'descripcion' => 'El Jefe Maestro vuelve en una aventura en la que tendrá que pelear contra el Covenant y contra el Flood. La campaña puede jugarse en cooperativo para hasta cuatro jugadores, e incluye un completo modo multijugador.',
            //'desarrolladora' => '12',
            'fecha' => '2007-09-25', 
            'slug' => 'halo-3',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Medievil',
            'descripcion' => 'Uno de los clásicos de la primera consola de Sony, PlayStation. Desarrollado en su momento por Cambridge Studio, el esquelético protagonista de esta aventura de plataformas en tercera persona se convirtió en todo un icono de la máquina de sobremesa, siendo este remake con gráficos actuales una homenaje que ha contado con varios miembros y diseñadores originales para garantizar su fidelidad.',
            //'desarrolladora' => '13',
            'fecha' => '2019-10-25', 
            'slug' => 'medievil',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'The Simpsons Hit & Run',
            'descripcion' => 'El juego sigue la historia de la Familia Simpson y de los ciudadanos de Springfield, quienes son testigos de muchos incidentes extraños que ocurren en la ciudad. Cuando varios residentes deciden tomar el asunto por sus propias manos.',
            //'desarrolladora' => '14',
            'fecha' => '2003-09-16', 
            'slug' => 'the-simpsons-hit-run',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Dark Souls II: Scholar of the First Sin',
            'descripcion' => 'Dark Souls II: Scholar of the First Sin es una versión definitiva de Dark Souls, que llega por primera vez a la nueva generación con gráficos mejorados. Además de los gráficos, incluye todo el contenido descargable hasta la fecha y cambios en la jugabilidad, convirtiéndolo en una versión definitiva de Dark Souls 2.',
            //'desarrolladora' => '6',
            'fecha' => '2014-04-15', 
            'slug' => 'dark-souls-ii-scholar-of-the-first-sin',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Dark Souls III: The Fire Fades Edition',
            'descripcion' => 'Dark Souls 3 es la tercera entrega de la saga Dark Souls que combina elementos de los juegos de aventura y acción y tercera persona, con tintes de rol para mejorar a nuestro personaje. En esta nueva entrega, visitaremos el oscuro y amplio reino de Lothric, aprenderemos nuevas habilidades vinculadas a las armas que empuñemos y combatiremos contra duras y ásperas criaturas, que en esta ocasión serán más peligrosas y rápidas que nunca.',
            //'desarrolladora' => '6',
            'fecha' => '2017-04-21', 
            'slug' => 'dark-souls-iii-the-fire-fades-edition',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'DOOM',
            'descripcion' => 'Bethesda e ID Software apuestan el todo por el todo y ofrecen una versión de DOOM completamente actualizada y puesta al día. Frenética, encarnizada y terrorífica y enfocada a la acción, esta nueva encarnación del videojuego de acción en primera persona vuelve a trasladarnos a un mundo futurista lleno de demonios y otros monstruos, presentarnos todos un arsenal de armas y varios modos de juego para un jugador, así como online.',
            //'desarrolladora' => '7',
            'fecha' => '2016-05-13', 
            'slug' => 'doom',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'God of War',
            'descripcion' => 'God of War es la vuelta de Kratos a los videojuegos tras la trilogía original. Mantendrá varios de los ingredientes indivisibles de su jugabilidad, apostará por un nuevo comienzo para el personaje y una ambientación nórdica, ofreciéndonos una perspectiva más madura y realista de la mitología de dioses y monstruos milenarios habitual en la serie de títulos. En God of War, Kratos será un guerrero más curtido y pasivo, pues tendrá que desempeñar el rol de padre en un frío y hostil escenario, al que parece haberse retirado para olvidar su pasado.',
            //'desarrolladora' => '15',
            'fecha' => '2018-04-20', 
            'slug' => 'god-of-war',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'GHOST OF TSUSHIMA',
            'descripcion' => 'Sucker Punch, creadores de la saga inFamous presentan un nuevo videojuego de acción, sigilo y aventura, que cambia la ambientación de ciencia ficción y personajes mutantes para trasladarnos a un pasado histórico de gran veracidad. Ghost of Tsushima nos llevará a un Japón feudal exquisitamente recreado en lo que es uno de los videojuegos más ambiciosos de la plataforma de Sony.',
            //'desarrolladora' => '16',
            'fecha' => '2020-07-17', 
            'slug' => 'ghost-of-tsushima',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Super Mario 64',
            'descripcion' => 'El juego que salió con Nintendo 64 e inventó el modelo que muchos otros seguirían. Mario 64 nos plantea el reto de conseguir 120 estrellas a lo largo de 15 mundos abiertos del castillo de la Princesa Peach, para lograr acabar con Bowser y liberar una vez más a la princesa.',
            //'desarrolladora' => '17',
            'fecha' => '1996-06-23', 
            'slug' => 'super-mario-64',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'The Legend of Zelda Ocarina of Time',
            'descripcion' => 'Un clásico de la historia del videojuego y del catálogo de Nintendo 64. El juego es uno de los primeros títulos, en temporalidad, de la saga, y establece los conceptos de Trifuerza y Ganon. Años después de su salida Ocarina of Time vuelve para contarnos la historia del pequeño Link, Zelda o Navi, entre muchos otros. Lucha contra Ganondorf por conservar Hyrule y defiende la Trifuerza en este remake del clásico de Shigeru Miyamoto.',
            //'desarrolladora' => '17',
            'fecha' => '2011-06-21', 
            'slug' => 'the-Legend-of-zelda-ocarina-of-time-3d',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Horizon Zero Dawn',
            'descripcion' => 'Horizon: Zero Dawn es un juego de aventuras en mundo abierto, con dosis acción y exploración en tercera persona a cargo de Guerrilla Games, responsables de Killzone. Ambientado en un futuro apocalíptico distante, los seres humanos han experimentado una regresión tecnológica que los ha devuelto a la edad de piedra y dividido en tribus. Encarnando a Aloy, una hábil cazadora, deberemos descubrir secretos del pasado, así como sobrevivir en un nuevo mundo plagado de criaturas robóticas inteligentes, hostiles y muy peligrosas.',
            //'desarrolladora' => '18',
            'fecha' => '2017-02-28', 
            'slug' => 'horizon-zero-dawn',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Minecraft',
            'descripcion' => 'Minecraft es un juego independiente creado por Markus Persson y el equipo de Mojang que está en constante evolución. Combina mundo abierto y aventuras tanto en modo para un solo jugador como en multijugador, obteniendo recursos en el mundo del juego y construyendo con ellos casas y otras estructuras. Tras su exitosísimo paso por diferentes plataformas, llega ahora a las consolas de Sony.',
            //'desarrolladora' => '19',
            'fecha' => '2011-11-28', 
            'slug' => 'minecraft',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Splatton 2',
            'descripcion' => 'Splatoon 2 es un videojuego de acción dentro del género shooter competitivo en tercera persona, desarrollado y producido por Nintendo como juego exclusivo de su plataforma Nintendo Switch.',
            //'desarrolladora' => '17',
            'fecha' => '2017-07-21', 
            'slug' => 'splatoon-2',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Cyberpunk 2077',
            'descripcion' => 'Cyberpunk 2077 es el nuevo videojuego de rol en primera persona con estructura de mundo abierto de CD Projekt RED. Los padres de The Witcher nos presentan una aventura de corte futurista y ciberpunk en la que encarnaremos a un personaje diseñado a nuestra medida y en la que tendremos que sobrevivir en una peligrosa urbe plagada de corporaciones, ciborgs, bandas y las más variadas amenazas tecnológicas.',
            //'desarrolladora' => '20',
            'fecha' => '2020-12-10', 
            'slug' => 'cyberpunk-2077',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Metal Gear Solid',
            'descripcion' => 'Metal Gear Solid para PSN es la reedición del clásico de Hideo Kojima para PlayStation One. MGS cuenta con más de 10 horas de juego en las que contaremos con diferentes finales según la toma de decisiones. Enfúndate el uniforme de Solid Snake y revive aquellas misiones donde la infiltración y la acción son inherentes al juego.',
            //'desarrolladora' => '21',
            'fecha' => '1998-09-03', 
            'slug' => 'metal-gear-solid',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Gears 5',
            'descripcion' => 'Gears of War 5 es la nueva entrega de la emblemática saga de acción en tercera persona Gears of War. De la mano de The Coalition, en esta ocasión la protagonista de esta aventura de tiros con numerosas oleadas de extraterrestres será Kait, apostando por volver a las raíces de la serie y mostrar un estilo gráfico y artístico más novedoso y arriesgado. Además, será el primer videojuego de Gears of War que adopte una estructura similar a la de mundo abierto.',
            //'desarrolladora' => '22',
            'fecha' => '2019-09-10', 
            'slug' => 'gears-5',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Zombie Army 4',
            'descripcion' => 'Zombie Army 4: Dead War nos lleva, a través de una propuesta de acción en tercera persona cooperativa, a un convulso y ficticio 1946, justo cuando Europa está completamente desgarrada y destruida por el nefasto plan Z de los nazis, que buscaba revivir a los monstruos y no muertos para instaurar el Tercer Reich. Sin embargo, gracias a la valentía de un grupo de soldados, el plan se pospuso y se eliminó, derrotando a los zombis y al mismísimo Führer, lanzándolo al infierno.',
            //'desarrolladora' => '10',
            'fecha' => '2020-02-04', 
            'slug' => 'zombie-army-4',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Fallout 4',
            'descripcion' => 'Bethesda presenta la cuarta entrega de la saga de juegos de rol Fallout. En esta secuela, encarnamos a la única persona con vida en el Refugio 111, en un mundo devastado por la guerra nuclear. Deberemos sobrevivir al Yermo, reconstruir refugios y combatir contra criaturas, mutantes, vestigios robóticos y carroñeros en los alrededores de una Boston apocalíptica.',
            //'desarrolladora' => '23',
            'fecha' => '2015-11-10', 
            'slug' => 'fallout-4',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Los Simpsons el videojuego',
            'descripcion' => 'El juego tiene 16 niveles y todos tienen relación con los capítulos de Los Simpson. Se ha revelado que los jugadores podrán controlar cuatro de los cinco miembros de la familia con sus propios niveles y capacidades únicas.',
            //'desarrolladora' => '3',
            'fecha' => '2007-10-30', 
            'slug' => 'los-simpsons-el-videojuego',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Metroid Prime 2 Echoes',
            'descripcion' => 'Transcurridos seis meses desde los eventos de Metroid Prime, Samus Aran ha sido contratada por la Federación Galáctica para investigar la desaparición de un grupo de soldados en el planeta Aether.',
            //'desarrolladora' => '24',
            'fecha' => '2005-05-16', 
            'slug' => 'metroid-prime-2-echoes',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Far Cry 3',
            'descripcion' => 'Far Cry vuelve llevándonos a una ambientación que recuerda a la del título original de Crytek. Esta tercera parte nos vuelve a llevar a una isla en la que, como turista, caemos presa de las diferentes facciones de mercenarios que la pueblan. Tendremos que hacer frente a los diferentes villanos, algunos de ellos al borde de la locura, con una gran libertad de movimiento, pudiendo movernos por un escenario abierto y afrontar cada situación como queramos. Cuenta con un modo cooperativo para hasta cuatro jugadores, con misiones especialmente diseñadas para él, y también con un modo multijugador lleno de posibilidades.',
            //'desarrolladora' => '1',
            'fecha' => '2012-11-29', 
            'slug' => 'far-cry-3',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Mario Kart 8',
            'descripcion' => 'Mario Kart 8 contará con nuevos personajes, ajustes jugables y un renovado Modo Batalla. De esta forma, Mario Kart 8 Deluxe tendrá 48 circuitos (los 32 del original más los 16 de los DLC) y 40 personajes, cinco de ellos nuevos. Estos son Inkling chico e Inkling chica de Splatoon, el Rey Boo, Huesitos y Bowsy, así como nuevas piezas con las que configurar nuestros vehículos.',
            //'desarrolladora' => '17',
            'fecha' => '2014-05-29', 
            'slug' => 'mario-kart-8',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Final Fantasy VII Remake',
            'descripcion' => 'Nueva adaptación de la obra maestra del rol japonés. El remake del séptimo capítulo de la saga nos trasladará al mundo de la entrega original añadiendo nuevos detalles la historia, así como aportando presumibles cambios jugables al sistema de batallas y de exploración. Este nuevo Final Fantasy VII tiene detrás al mismo equipo creativo del original.',
            //'desarrolladora' => '25',
            'fecha' => '2020-04-10', 
            'slug' => 'final-fantasy-vii-remake',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'A Way Out',
            'descripcion' => 'A Way Out es un videojuego de aventura de componente marcadamente cooperativo que nos invitará a jugar con otra persona, ya sea a nivel local u online, en una peligrosa huida de una cárcel. El videojuego, del creador de Brothers: A Tales of Two Sons, nos presenta una historia cinematográfica en la que la ayuda entre los dos personajes será vital y parte indivisible de su mecánica.',
            //'desarrolladora' => '3',
            'fecha' => '2018-03-23', 
            'slug' => 'a-way-out',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'The Witcher 3 Wild Hunt',
            'descripcion' => 'The Witcher 3 es la tercera entrega de la saga The Witcher desarrollada por CD Projekt. Se trata de un videojuego que mezcla elementos de aventura, acción y rol en un mundo abierto épico basado en la fantasía. El jugador controlará una vez más a Geralt de Rivia, el afamado cazador de monstruos, (también conocido como el Lobo Blanco) y se enfrentará a un diversificadísimo bestiario y a unos peligros de unas dimensiones nunca vistas hasta el momento en la serie, mientras recorre los reinos del Norte.',
            //'desarrolladora' => '20',
            'fecha' => '2015-05-19', 
            'slug' => 'the-witcher-3-wild-hunt',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Red Dead Redemption 2',
            'descripcion' => 'Red Dead Redemption 2 es la secuela del videojuego de éxito de Rockstar Red Dead Redemption (2010), considerado como uno de los mejores títulos de la compañía. Se trata de la tercera entrega de la saga Red Dead, iniciada en 2004 con Red Dead Revolver y nos trasladará de nuevo al Salvaje Oeste para ponernos en el escenario de mundo abierto más grande jamás creado por los padres de Grand Theft Auto y contarnos una historia sobre forajidos.',
            //'desarrolladora' => '8',
            'fecha' => '2018-10-26', 
            'slug' => 'red-dead-redemption-2',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Pokémon Lets Go, Pikachu! y Lets Go, Eevee!',
            'descripcion' => 'Se tratan del debut de la reputada saga de monstruos de bolsillo coleccionables en Nintendo Switch. Considerados una reinterpretación de Pokémon Amarillo, llegan a la consola híbrida de Nintendo ofreciendo una serie de mecánicas y formas de jugar diseñadas tanto para los veteranos de la saga como para los nuevos jugadores y novatos que decidan acercarse a estos juegos por primera vez.',
            //'desarrolladora' => '26',
            'fecha' => '2018-11-16', 
            'slug' => 'pokemon-lets-go-pikachu-eevee',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Crash Team Racing Nitro-Fueled',
            'descripcion' => 'Crash Team Racing Nitro-Fueled es la vuelta del famoso marsupial al mundo de los videojuegos y el karting. Este nuevo remake cuenta con los modos de juego, personajes, circuitos, power-ups y armas de siempre, adaptando sus controles y otros ingredientes a los nuevos tiempos. La puesta al día del mítico Crash Team Racing cuenta además con modo online y competiciones a través de internet.',
            //'desarrolladora' => '27',
            'fecha' => '2019-06-21', 
            'slug' => 'crash-team-racing-nitro-fueled',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'The Last Guardian',
            'descripcion' => 'Tras Ico y Shadow of the Colossus, éste es el tercer juego del Team Ico y su director, Fumito Ueda. No es una secuela de ninguno de los dos, pero mantiene su estilo mágico e imaginativo, llevándonos a un mundo de fantasía en el que nuestro protagonista estará acompañado por una gigantesca criatura, Trico, que nos ayudará en nuestra aventura, convirtiéndose en un aliado con el que habrá que interactuar para superar los puzles y situaciones que nos encontraremos.',
            //'desarrolladora' => '5',
            'fecha' => '2016-12-06', 
            'slug' => 'the-last-guardian',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Monster Hunter World',
            'descripcion' => 'Monster Hunter World es el retorno de la serie a las consolas de sobremesa, permitiéndonos cazar criaturas gigantes en un entorno salvaje, ya sea en solitario o con tres cazadores con un nuevo sistema multijugador drop-in que permite cooperativo entre regiones. Mantendrá las señas de identidad, su sistema de creación y equipamiento para cazar monstruos, mientras mejoramos nuestras habilidades. Los recursos se podrán utilizar para mejoras y otro equipamiento. Su jugabilidad facilita explorar el mapa sin transiciones, con ciclo horario.',
            //'desarrolladora' => '28',
            'fecha' => '2018-01-26', 
            'slug' => 'monster-hunter-world',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Killing Floor 2',
            'descripcion' => 'Se trata de un nuevo título de acción en primera persona. El juego se ambienta un mes después de los hechos de la primera entrega, en un mundo totalmente devastado. Para sobrevivir, tendremos que poner en práctica nuestras habilidades con numerosas armas mientras destrozamos y machacamos a todo lo que se nos ponga por delante.',
            //'desarrolladora' => '29',
            'fecha' => '2016-11-18', 
            'slug' => 'killing-floor-2',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Sekiro Shadows Die Twice',
            'descripcion' => 'Sekiro: Shadows Die Twice es el nuevo videojuego de FromSoftware, el reputado estudio creador de obras maestras como Tenchu, Bloodborne o Dark Souls. Se trata de un aventura de rol, acción y sigilo.',
            //'desarrolladora' => '6',
            'fecha' => '2019-03-22', 
            'slug' => 'sekiro-shadows-die-twice',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Resident Evil 7 BioHazard',
            'descripcion' => 'Se trata de la séptima entrega de esta serie, que ofrece un cambio radical respecto a anteriores títulos de la saga, con el objetivo de volver a sus orígenes. Siguiendo la estela de otros juegos de miedo, Resident Evil 7 adopta la perspectiva en primera persona para dale un nuevo giro a la fórmula y sumergir al jugador en su atmósfera.',
            //'desarrolladora' => '28',
            'fecha' => '2017-01-24', 
            'slug' => 'resident-evil-7-biohazard',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Resident Evil 4',
            'descripcion' => 'Leon Kennedy, protagonista de Resident Evil 2, viaja a España para hacer frente a oleadas de infectados en una cuarta parte que tiene más acción que los primeros juegos, una perspectiva sobre el hombro, y una historia que nos irá sumergiendo poco a poco.',
            //'desarrolladora' => '28',
            'fecha' => '2005-01-11', 
            'slug' => 'resident-evil-4',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Mafia Definitive Edition',
            'descripcion' => 'Mafia: Definitive Edition es el ambicioso remake del primer Mafia, un videojuego que marcó un antes y un después en el género de la acción en tercera persona en mundo abierto. Mejora significativamente los gráficos y las mejoras del original, sino que también profundiza en su galardonada historia, y añade un guion actualizado lleno de nuevos y ricos diálogos.',
            //'desarrolladora' => '30',
            'fecha' => '2020-09-25', 
            'slug' => 'mafia-definitive-editon',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'The Last of Us Part 2',
            'descripcion' => 'En las afueras de Jackson (Wyoming), Joel relata los eventos de Salt Lake City, el escape de St. Marys Hospital y la mentira que le dijo a Ellie para protegerla de la verdad; a su hermano Tommy.',
            //'desarrolladora' => '31',
            'fecha' => '2020-06-19', 
            'slug' => 'the-last-of-us-part-2',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Kingdom Come Deliverance',
            'descripcion' => 'Kingdom Come: Deliverance es un juego de rol de mundo abierto en primera persona que fue financiado en Kickstarter y que consiguió su objetivo en tan solo dos días. Una de sus características más destacadas la encontramos en el hecho de que a pesar de tratarse de un título de ambientación medieval, no tendrá ningún tipo de elemento de fantasía.',
            //'desarrolladora' => '32',
            'fecha' => '2018-02-13', 
            'slug' => 'kingdom-come-deliverance',
        ]);

        DB::table('juegos')->insert([
            'nombre' => 'Need For Speed Hot Pursuit',
            'descripcion' => 'La saga Need for Speed vuelve a sus orígenes de la mano de los creadores de la saga Burnout. La espectacularidad gráfica de estos juegos y su sensación de velocidad se unen al estilo de las carreras y persecuciones del Need for Speed Hot Pursuit original, creando un juego frenético lleno de derrapes y adrenalina.',
            //'desarrolladora' => '3',
            'fecha' => '2010-11-16', 
            'slug' => 'need-for-speed-hot-pursuit',
        ]);*/

    }
}
