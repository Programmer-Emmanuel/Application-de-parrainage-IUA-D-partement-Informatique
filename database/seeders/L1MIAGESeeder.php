<?php

namespace Database\Seeders;

use App\Models\L1MIAGE;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class L1MIAGESeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etudiants = [
            ['matricule' => '25INF03858S', 'nom' => 'ABE OKAIGNY CHRIST-LOIC', 'telephone' => null, 'email' => 'okaigny.abe@iua.ci'],
            ['matricule' => '25INF015666S', 'nom' => 'ACHI  CLAY LOÏC-EMMANUEL', 'telephone' => null, 'email' => 'clay.achi@iua.ci'],
            ['matricule' => '25INF01972S', 'nom' => 'ADJISSOU ADJOBA ROSELAINE', 'telephone' => null, 'email' => 'adjoba.adjissou@iua.ci'],
            ['matricule' => '25INF00984S', 'nom' => 'ADOBI ADELE DIVINE GRACE', 'telephone' => null, 'email' => 'adele.adobi@iua.ci'],
            ['matricule' => '25INF4032S', 'nom' => 'AFLO CHRIS EMMANUEL', 'telephone' => null, 'email' => 'chris.aflo@iua.ci'],
            ['matricule' => '25INF00900S', 'nom' => 'AHOUA  LILIANE VIERA', 'telephone' => null, 'email' => 'liliane.ahoua@iua.ci'],
            ['matricule' => '25INF00800S', 'nom' => 'AIDARA LADJI KHALIL', 'telephone' => null, 'email' => 'ladji.aidara@iua.ci'],
            ['matricule' => '25INF02526S', 'nom' => 'AKOSSI FRANCK VIANNEY', 'telephone' => null, 'email' => 'franck.akossi@iua.ci'],
            ['matricule' => '25INF03716S', 'nom' => 'AMONCHI EDI ARNOLD YOAN', 'telephone' => null, 'email' => 'edi.amonchi@iua.ci'],
            ['matricule' => '25INF00243B', 'nom' => 'ANE JEAN MICHEL MONDESIR', 'telephone' => null, 'email' => 'jean.ane@iua.ci'],
            ['matricule' => '25INF02962S', 'nom' => 'ARRIKO ARRIKO ELIEZER', 'telephone' => null, 'email' => 'arriko.arriko@iua.ci'],
            ['matricule' => '25INF02720S', 'nom' => 'ATTOUNGBRE  BOMOUA GRACE ANGEL', 'telephone' => null, 'email' => 'bomoua.attoungbre@iua.ci'],
            ['matricule' => '25INF04058S', 'nom' => 'BADIEL DAVID BONAVENTURE', 'telephone' => null, 'email' => 'david.badiel@iua.ci'],
            ['matricule' => '25INF00668S', 'nom' => 'BAKAYOKO  ABDALLAH FALIKOU TIE', 'telephone' => null, 'email' => 'abdallah.bakayoko@iua.ci'],
            ['matricule' => '25INF03840S', 'nom' => 'BAKAYOKO EL HADJ IBRAHIM', 'telephone' => null, 'email' => 'el.bakayoko@iua.ci'],
            ['matricule' => '25INF01841S', 'nom' => 'BAMBA LACINE', 'telephone' => null, 'email' => 'lacine.bamba@iua.ci'],
            ['matricule' => '25INF00700S', 'nom' => 'BAMBA VASSE ISMAEL', 'telephone' => null, 'email' => 'vasse.bamba@iua.ci'],
            ['matricule' => '25INF0052S', 'nom' => 'BASSA ANIAMANTIE MOFODJA REGIS', 'telephone' => null, 'email' => 'aniamantie.bassa@iua.ci'],
            ['matricule' => '25INF015126S', 'nom' => 'BEUGRE  BATCHO ANGE-OLIVIA', 'telephone' => null, 'email' => 'batcho.beugre@iua.ci'],
            ['matricule' => '25INF015776S', 'nom' => 'BLAFFON  STEVE RUDOLF AYMAR', 'telephone' => null, 'email' => 'steve.blaffon@iua.ci'],
            ['matricule' => '25INF02644S', 'nom' => 'BOGBE ANGE ISMAEL', 'telephone' => null, 'email' => 'ange.bogbe@iua.ci'],
            ['matricule' => '25INF00718S', 'nom' => 'BONI AYAH TRYPHAINE KRISTEN AM', 'telephone' => null, 'email' => 'ayah.boni@iua.ci'],
            ['matricule' => '25INF03614S', 'nom' => 'CAPRARO FLAVIO ADRIANO RODANE', 'telephone' => null, 'email' => 'flavio.capraro@iua.ci'],
            ['matricule' => '25INF00302S', 'nom' => 'COULIBALY ADAMA YOUNOUS TIGUI', 'telephone' => null, 'email' => 'adama.coulibaly@iua.ci'],
            ['matricule' => '25INF03102S', 'nom' => 'COULIBALY AWA NOURA', 'telephone' => null, 'email' => 'awa.coulibaly@iua.ci'],
            ['matricule' => '25INF03312S', 'nom' => 'COULIBALY FATIM PENIEL EMMANUE', 'telephone' => null, 'email' => 'fatim.coulibaly@iua.ci'],
            ['matricule' => '25INF03924S', 'nom' => 'COULIBALY MICHAEL SARATIKI ADA', 'telephone' => null, 'email' => 'michael.coulibaly@iua.ci'],
            ['matricule' => '25INF02250S', 'nom' => 'COULIBALY ZANA MOUSSA', 'telephone' => null, 'email' => 'zana.coulibaly@iua.ci'],
            ['matricule' => '25INF03330S', 'nom' => 'DEMBELE  ABOUBAKAR SIDIKI', 'telephone' => null, 'email' => 'aboubakar.dembele@iua.ci'],
            ['matricule' => '25INF00958S', 'nom' => 'DESSAH ZEHOUO DIVINE SHUNI', 'telephone' => null, 'email' => 'zehouo.dessah@iua.ci'],
            ['matricule' => '25INF015138S', 'nom' => 'DIALLO MARIAM', 'telephone' => null, 'email' => 'mariam.diallo@iua.ci'],
            ['matricule' => '25INF015144S', 'nom' => 'DIARRA ABDOUSALAM ISMAEL', 'telephone' => null, 'email' => 'abdousalam.diarra@iua.ci'],
            ['matricule' => '25INF02694S', 'nom' => 'DIAWARA MAHAMADI', 'telephone' => null, 'email' => 'mahamadi.diawara@iua.ci'],
            ['matricule' => '25INF01310S', 'nom' => 'DIBY EVA-JOELLE MARIA KOUASSI', 'telephone' => null, 'email' => 'eva.diby@iua.ci'],
            ['matricule' => '25INF00966S', 'nom' => 'DIOMANDE  OHI ABDOUL KARIM', 'telephone' => null, 'email' => 'ohi.diomande@iua.ci'],
            ['matricule' => '25INF001030S', 'nom' => 'DIOMANDE ABOUBACAR KHALIL', 'telephone' => null, 'email' => 'aboubacar.diomande@iua.ci'],
            ['matricule' => '25INF161270S', 'nom' => 'DJEBAN KOUADIO PAUL EMILE', 'telephone' => null, 'email' => 'kouadio.djeban@iua.ci'],
            ['matricule' => '25INF015296S', 'nom' => 'DJEBLE HANIEL JEAN HENOC', 'telephone' => null, 'email' => 'haniel.djeble@iua.ci'],
            ['matricule' => '25INF016125B', 'nom' => 'DOUMBIA  KADHY MOUNIRA', 'telephone' => null, 'email' => 'kadhy.doumbia@iua.ci'],
            ['matricule' => '25INF00444S', 'nom' => 'DOUMBIA AWA', 'telephone' => null, 'email' => 'awa.doumbia@iua.ci'],
            ['matricule' => '25INF00574S', 'nom' => 'ENOKOU OCHRIEL YANN KESSE', 'telephone' => null, 'email' => 'ochriel.enokou@iua.ci'],
            ['matricule' => '25INF00954S', 'nom' => 'ENOUPAYE ATTE MARC ISRAEL', 'telephone' => null, 'email' => 'atte.enoupaye@iua.ci'],
            ['matricule' => '25INF015622S', 'nom' => 'GBOGOURI  GNAKOURI EDEN', 'telephone' => null, 'email' => 'gnakouri.gbogouri@iua.ci'],
            ['matricule' => '25INF01044S', 'nom' => 'GNALI JUNIOR STEPHANE', 'telephone' => null, 'email' => 'junior.gnali@iua.ci'],
            ['matricule' => '25INF00099B', 'nom' => 'GNAMIEN  STEPHEN ANTONIO', 'telephone' => null, 'email' => 'stephen.gnamien@iua.ci'],
            ['matricule' => '25INF02902S', 'nom' => 'GNEKRE TRESOR ANGE EMMANUEL', 'telephone' => null, 'email' => 'tresor.gnekre@iua.ci'],
            ['matricule' => '25INF01086S', 'nom' => 'GORE LOU WELAVA ARLETTE AUDREY', 'telephone' => null, 'email' => 'lou.gore@iua.ci'],
            ['matricule' => '25INF01340S', 'nom' => 'GOULEHI GUEHABOGNON ELI ULRICH', 'telephone' => null, 'email' => 'guehabognon.goulehi@iua.ci'],
            ['matricule' => '25INF03532S', 'nom' => 'GUINNIN ANNE AUDREY', 'telephone' => null, 'email' => 'anne.guinnin@iua.ci'],
            ['matricule' => '25INF01304S', 'nom' => 'GUY TCHEBLEY EMMANUEL', 'telephone' => null, 'email' => 'tchebley.guy@iua.ci'],
            ['matricule' => '25INF02724S', 'nom' => 'KABA MAMADY', 'telephone' => null, 'email' => 'mamady.kaba@iua.ci'],
            ['matricule' => '25INF03316S', 'nom' => 'KADJANE  ADIOW LESLIE GRACE FL', 'telephone' => null, 'email' => 'adiow.kadjane@iua.ci'],
            ['matricule' => '25INF016138S', 'nom' => 'KAGBA KAGBA HERVE LUC HERMANN', 'telephone' => null, 'email' => 'kagba.kagba@iua.ci'],
            ['matricule' => '25INF05032S', 'nom' => 'KAKOU ALIET JERIEL YOSHUAEL', 'telephone' => null, 'email' => 'aliet.kakou@iua.ci'],
            ['matricule' => '25INF00371B', 'nom' => 'KALOKA MINATA', 'telephone' => null, 'email' => 'minata.kaloka@iua.ci'],
            ['matricule' => '25INF00908S', 'nom' => 'KASSI YANN OTHNIEL', 'telephone' => null, 'email' => 'yann.kassi@iua.ci'],
            ['matricule' => '25INF01122S', 'nom' => 'KEÏTA MARIAM', 'telephone' => null, 'email' => 'mariam.keïta@iua.ci'],
            ['matricule' => '25INF00494S', 'nom' => 'KOFFI HAIDAR ROHAM SERVE', 'telephone' => null, 'email' => 'haidar.koffi@iua.ci'],
            ['matricule' => '25INF01514S', 'nom' => 'KOUABENAN ADJA ESTHER TRIPHENE', 'telephone' => null, 'email' => 'adja.kouabenan@iua.ci'],
            ['matricule' => '25INF01328S', 'nom' => 'KOUAKOU  MINY MARIE JULES LILA', 'telephone' => null, 'email' => 'miny.kouakou@iua.ci'],
            ['matricule' => '24INF00278S', 'nom' => 'KOUAKOU  N\'DRAMAN ABDUL-AZIZ', 'telephone' => null, 'email' => 'n\'draman.kouakou@iua.ci'],
            ['matricule' => '25INF01092S', 'nom' => 'KOUAME  MARIE AUDE KIMORA', 'telephone' => null, 'email' => 'marie.kouame@iua.ci'],
            ['matricule' => '25INF01566S', 'nom' => 'KOUASSI  MARC MICHEE MIGUEL AL', 'telephone' => null, 'email' => 'marc.kouassi@iua.ci'],
            ['matricule' => '25INF00075B', 'nom' => 'KOUASSI HELLOIS KACOUTCHE AUGU', 'telephone' => null, 'email' => 'hellois.kouassi@iua.ci'],
            ['matricule' => '25INF00732S', 'nom' => 'KOUASSI N\'GATTA PAUL AYMAR', 'telephone' => null, 'email' => 'n\'gatta.kouassi@iua.ci'],
            ['matricule' => '25INF015672S', 'nom' => 'KRAMO KOUADIO JEAN CHRIST EVAN', 'telephone' => null, 'email' => 'kouadio.kramo@iua.ci'],
            ['matricule' => '25INF00257B', 'nom' => 'LOBIA GREGBAHON ANGE DEBORAH', 'telephone' => null, 'email' => 'gregbahon.lobia@iua.ci'],
            ['matricule' => '25INF015774S', 'nom' => 'MAMBO YANNICK DANIEL', 'telephone' => null, 'email' => 'yannick.mambo@iua.ci'],
            ['matricule' => '25INF015224S', 'nom' => 'MEITE  AWA YASSINE', 'telephone' => null, 'email' => 'awa.meite@iua.ci'],
            ['matricule' => '25INF015710', 'nom' => 'MELAGNE  ANGE EMERIC', 'telephone' => null, 'email' => 'ange.melagne@iua.ci'],
            ['matricule' => '25INF01272S', 'nom' => 'MENEY CHRIST  EMMANUEL DESIRE', 'telephone' => null, 'email' => 'christ.meney@iua.ci'],
            ['matricule' => '25INF00157B', 'nom' => 'NAPON ANGE ASTRID EMMANUELLA', 'telephone' => null, 'email' => 'ange.napon@iua.ci'],
            ['matricule' => '25INF03026S', 'nom' => 'N\'DAH JACOB HUSSEN', 'telephone' => null, 'email' => 'jacob.n\'dah@iua.ci'],
            ['matricule' => '25INF1625S', 'nom' => 'N\'GNANZOU EHILE YANN STEPHEN', 'telephone' => null, 'email' => 'ehile.n\'gnanzou@iua.ci'],
            ['matricule' => '25INF016186S', 'nom' => 'N\'GORAN  MADOCHEE ELIE AKA', 'telephone' => null, 'email' => 'madochee.n\'goran@iua.ci'],
            ['matricule' => '25INF00949B', 'nom' => 'N\'GUESSAN-DOLLOU GLISSO CHRIST', 'telephone' => null, 'email' => 'dollou.n\'guessan@iua.ci'],
            ['matricule' => '25INF01074S', 'nom' => 'N\'KOUMO AKRE ELIE YOHANN', 'telephone' => null, 'email' => 'akre.n\'koumo@iua.ci'],
            ['matricule' => '25INF02712S', 'nom' => 'NOMEL PAUL-MARIE ROMUALD', 'telephone' => null, 'email' => 'paul.nomel@iua.ci'],
            ['matricule' => '25INF02244S', 'nom' => 'N\'ZI N\'GUESSAN MARIE LUCIENNE', 'telephone' => null, 'email' => 'n\'guessan.n\'zi@iua.ci'],
            ['matricule' => '25INF00675B', 'nom' => 'OTTRO PRINCE ISAAC JOACHIM', 'telephone' => null, 'email' => 'prince.ottro@iua.ci'],
            ['matricule' => '25INF02060S', 'nom' => 'OUATTARA  AFFOUA KADIDJATOU', 'telephone' => null, 'email' => 'affoua.ouattara@iua.ci'],
            ['matricule' => '25INF023206S', 'nom' => 'OUATTARA  SANGBAYAGA CHRIST EM', 'telephone' => null, 'email' => 'sangbayaga.ouattara@iua.ci'],
            ['matricule' => '25INF01900S', 'nom' => 'OUEDRAOGO ANGE EDEN KADER', 'telephone' => null, 'email' => 'ange.ouedraogo@iua.ci'],
            ['matricule' => '25INF03242S', 'nom' => 'RAMDE YSSOUF', 'telephone' => null, 'email' => 'yssouf.ramde@iua.ci'],
            ['matricule' => '25INF02064S', 'nom' => 'SACKO SEKOU', 'telephone' => null, 'email' => 'sekou.sacko@iua.ci'],
            ['matricule' => '25INF00955B', 'nom' => 'SAKO SIDI HAMED', 'telephone' => null, 'email' => 'sidi.sako@iua.ci'],
            ['matricule' => '25INF01528S', 'nom' => 'SAWADOGO ABDOUL RAZACK GBANE', 'telephone' => null, 'email' => 'abdoul.sawadogo@iua.ci'],
            ['matricule' => '25INF00133B', 'nom' => 'SIDIME MOHAMED', 'telephone' => null, 'email' => 'mohamed.sidime@iua.ci'],
            ['matricule' => '25INF00485B', 'nom' => 'SORO KANIGUI IBRAHIM', 'telephone' => null, 'email' => 'kanigui.soro@iua.ci'],
            ['matricule' => '25INF02276S', 'nom' => 'TANOE ESSI MARIE EMMANUELLE', 'telephone' => null, 'email' => 'essi.tanoe@iua.ci'],
            ['matricule' => '25INF02792S', 'nom' => 'TASSOHOU MOMBLEON RAYANE ELIE', 'telephone' => null, 'email' => 'mombleon.tassohou@iua.ci'],
            ['matricule' => '25INF00761B', 'nom' => 'TONGUY  DANHO ITHIEL KADMIEL E', 'telephone' => null, 'email' => 'danho.tonguy@iua.ci'],
            ['matricule' => '25INF015192S', 'nom' => 'TOURE  GNINLAN ANGE DESIRE JAU', 'telephone' => null, 'email' => 'gninlan.toure@iua.ci'],
            ['matricule' => '25INF00730S', 'nom' => 'TOURE PELADAMA MICHEL', 'telephone' => null, 'email' => 'peladama.toure@iua.ci'],
            ['matricule' => '25INF00774S', 'nom' => 'TOURE YACOUBA SIE HAMED', 'telephone' => null, 'email' => 'yacouba.toure@iua.ci'],
            ['matricule' => '25INF01960S', 'nom' => 'VILLACA MOAYE CHRIST DAVID CAN', 'telephone' => null, 'email' => 'moaye.villaca@iua.ci'],
            ['matricule' => '25INF00057B', 'nom' => 'VOLI-BI IRIE PAUL ELIE YANNICK', 'telephone' => null, 'email' => 'bi.voli@iua.ci'],
            ['matricule' => '25INF02188S', 'nom' => 'VRI AYO EUNICE LESLIE OPHELIA', 'telephone' => null, 'email' => 'ayo.vri@iua.ci'],
            ['matricule' => '25INF03222S', 'nom' => 'WATTEY ROXANE OPELY', 'telephone' => null, 'email' => 'roxane.wattey@iua.ci'],
            ['matricule' => '25INF02612S', 'nom' => 'YAO KOUADIO CHRIST-ADRIEL', 'telephone' => null, 'email' => 'kouadio.yao@iua.ci'],
            ['matricule' => '25INF02212S', 'nom' => 'YEO KIGNON WEPLIN YVES', 'telephone' => null, 'email' => 'kignon.yeo@iua.ci'],
            ['matricule' => '25INF001008S', 'nom' => 'YPE ASTRID BERELYCE TRIPHENE', 'telephone' => null, 'email' => 'astrid.ype@iua.ci'],
            ['matricule' => '25INF00860S', 'nom' => 'ZOUA BI TIZIE MARC ALEX DIT SO', 'telephone' => null, 'email' => 'bi.zoua@iua.ci'],
        ];

        $count = 0;

        foreach ($etudiants as $ligne) {
            try {
                $etudiant = new L1MIAGE();
                $etudiant->id = (string) Str::uuid();
                $etudiant->matricule = $ligne['matricule'];
                $etudiant->nom = $ligne['nom'];
                $etudiant->telephone = $ligne['telephone'];
                $etudiant->email = $ligne['email'];
                $etudiant->save();
                $count++;
            } catch (\Illuminate\Database\QueryException $e) {
                $this->command->warn("     - Doublon ignoré (matricule/téléphone/email déjà utilisé) : {$ligne['matricule']} - {$ligne['nom']}");
            }
        }

        $this->command->info("     - {$count} étudiants L1 MIAGE créés");
    }
}