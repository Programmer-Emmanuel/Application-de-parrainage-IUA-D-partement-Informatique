<?php

namespace Database\Seeders;

use App\Models\L2MIAGE;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class L2MIAGESeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etudiants = [
            ['matricule' => '23INF00555', 'nom' => 'agboke eslih eleazare', 'telephone' => '0576363325', 'email' => 'eslih.agboke2003@iua.ci'],
            ['matricule' => '23INF00731', 'nom' => 'Aboya Kouassi Jean Duverney', 'telephone' => '0500951392', 'email' => 'jean.aboya@iua.ci'],
            ['matricule' => '24INF00039B', 'nom' => 'FOFANA ROXANE', 'telephone' => '0797024563', 'email' => 'roxane.fofana@iua.ci'],
            ['matricule' => '24INF00129B', 'nom' => 'OUATTARA Emmanuelle Stella olive Moaye', 'telephone' => '0150466593', 'email' => 'olive.ouattara@iua.ci'],
            ['matricule' => '24INF00129S', 'nom' => 'DATTE KOFFI IVAN MICHEL ANGE', 'telephone' => '0141797300', 'email' => 'angewilliam34@gmail.com'],
            ['matricule' => '24INF00134S', 'nom' => 'Ballo Lou kovodro Esther', 'telephone' => '0702605211', 'email' => 'kovodro.ballo@iua.ci'],
            ['matricule' => '24INF00171S', 'nom' => 'NOGBOU jean levick Arnold', 'telephone' => '0757643635', 'email' => 'jean.nogbou@iua.ci'],
            ['matricule' => '24INF00175B', 'nom' => 'Sey Yaniss-Élie', 'telephone' => '0504272827', 'email' => 'yaniss.sey@iua.ci'],
            ['matricule' => '24INF00204S', 'nom' => 'Djehidé Waï Marie Noëlle', 'telephone' => '0717522066', 'email' => 'wai.djehide@iua.ci'],
            ['matricule' => '24INF00219B', 'nom' => 'Lekadou Charles', 'telephone' => '0712621737', 'email' => 'gnato.lekadou@iua.ci'],
            ['matricule' => '24INF00251B', 'nom' => 'KONE Amirah Alika Sountchor', 'telephone' => '0173260609', 'email' => 'amirah.kone@iua.ci'],
            ['matricule' => '24INF00272S', 'nom' => 'Grabotte Ibrahim', 'telephone' => '0769011043', 'email' => 'grabotte. ibrahim @iua.ci'],
            ['matricule' => '24INF00294S', 'nom' => 'AHOULE ANGE YOHAN EZÉCHIEL', 'telephone' => '0778608913', 'email' => 'ange.ahoule@iua.ci'],
            ['matricule' => '24INF00296S', 'nom' => 'Berete moustapha', 'telephone' => '0788185044', 'email' => 'moustapha.berete@iua.ci'],
            ['matricule' => '24INF00314S', 'nom' => 'KOUAME BEKANHOULE ABDOUL-NOOR-DIN', 'telephone' => '0172163594', 'email' => 'kouame.bekanhoule@iua.ci'],
            ['matricule' => '24INF00379B', 'nom' => 'N’ZI DEMOAHET DOLOUROU ALVIN', 'telephone' => '0759349065', 'email' => 'alvin.nzi@iua.ci'],
            ['matricule' => '24INF00384S', 'nom' => 'BAMBA AMARA CHRISTIAN', 'telephone' => '0102601695', 'email' => 'amara.bamba@iua.ci'],
            ['matricule' => '24INF00473S', 'nom' => 'Kouamé Komenan Henri', 'telephone' => '0103232890', 'email' => 'henri2.kouame@iua.ci'],
            ['matricule' => '24INF00477S', 'nom' => 'N’GATTA AUDREY MARIE-CATHERINE', 'telephone' => '0768531359', 'email' => 'audreyngatta0@gmail.com'],
            ['matricule' => '24INF00565S', 'nom' => 'Brou Ange Allen', 'telephone' => '0705062359', 'email' => 'allen.brou@iua.ci'],
            ['matricule' => '24INF00639S', 'nom' => 'Ouattara Kouakou Charlemagne', 'telephone' => '0576135049', 'email' => 'charlemagne.kouakou@iua.ci'],
            ['matricule' => '24INF00683S', 'nom' => 'Kouassi Kouakou Salomon', 'telephone' => '0717264298', 'email' => 'salomonkouassi.@iua.ci'],
            ['matricule' => '24INF00698S', 'nom' => 'Yao n’as Armel clovis', 'telephone' => '0103581068', 'email' => 'clovis.yao@iua.ci'],
            ['matricule' => '24INF00895S', 'nom' => 'Traore Kadidja', 'telephone' => '0777177477', 'email' => 'kadidja.traore@iua.ci'],
            ['matricule' => '24INF00897S', 'nom' => 'GNAKRI jean Yves', 'telephone' => '0714764683', 'email' => 'jean.gnakry@iua.ci'],
            ['matricule' => '24INF00970S', 'nom' => 'NOGBOU Agniman Marie Philomène', 'telephone' => '0757387786', 'email' => 'agniman.nogbou@iua.ci'],
            ['matricule' => '24INF00987S', 'nom' => 'KOUAME YAO EMMANUEL', 'telephone' => '0700111009', 'email' => 'yao1.kouame@iua.ci'],
            ['matricule' => '24INF01166S', 'nom' => 'Doumbia korotoumou', 'telephone' => '0715908277', 'email' => 'korotoumou2.doumbia@iua.ci'],
            ['matricule' => '24INF01180S', 'nom' => 'Bomisso Dogbé christian-valère', 'telephone' => '0151519920', 'email' => 'dogbe.bomisso@iua.ci'],
            ['matricule' => '24INF01283S', 'nom' => 'TOURE CHEICK OUMAR', 'telephone' => '0574537508', 'email' => 'ot6981976@gmail.com'],
            ['matricule' => '24INF01288S', 'nom' => 'Kouakou n’zi daniel', 'telephone' => '0170277704', 'email' => 'nzi.kouakou@iua.ci'],
            ['matricule' => '24INF01308S', 'nom' => 'KOUYATE DJENEBA MOUSSA', 'telephone' => '0555283870', 'email' => 'djeneba.kouyate@iua.ci'],
            ['matricule' => '24INF01319S', 'nom' => 'Fofana Kady', 'telephone' => '0151066570', 'email' => 'kady.fofana@iua.ci'],
            ['matricule' => '24INF01374S', 'nom' => 'N\'goran Chris Emmanuel Olivier', 'telephone' => '0575112641', 'email' => 'chris.ngoran@iua.ci'],
            ['matricule' => '24INF01401S', 'nom' => 'Silue Doh Lassinan', 'telephone' => '0585816691', 'email' => 'doh.silue@iua.ci'],
            ['matricule' => '24INF01502S', 'nom' => 'BONI Aboueur Nancy Laurine', 'telephone' => '0100551597', 'email' => 'aboueur.boni@iua.ci'],
            ['matricule' => '25INF00094S', 'nom' => 'Tchotche Atcho Samuel Jérémie', 'telephone' => '0700888744', 'email' => 'atcho.tchotche@iua.ci'],
            ['matricule' => '25INF016151B', 'nom' => 'Koffi ama kacoubla Sophia carène', 'telephone' => '0767768131', 'email' => 'ama.koffi1@iua.ci'],
            ['matricule' => '25INF01800S', 'nom' => 'ADOU YAPI BRICE JUSTICE', 'telephone' => '0701177542', 'email' => 'brice.adou@iua.ci'],
            ['matricule' => '25INF04366S', 'nom' => 'Allé abbe Yvann cliff', 'telephone' => '0779068074', 'email' => 'cliff.alle@iua.ci'],
            ['matricule' => '25INF04963S', 'nom' => 'Kouassi konambo johann juste cléry', 'telephone' => '0585030906', 'email' => 'clery.kouassi@iua.ci'],
            ['matricule' => '25INF05442S', 'nom' => 'AMON ATTOUBOU ELIE ENOCK BENJAMIN', 'telephone' => '0172751272', 'email' => 'attoubou.amon@iua.ci'],
            ['matricule' => '25UNF05172S', 'nom' => 'Aoussou Yao Jonas manasser', 'telephone' => '0700312240', 'email' => 'jonas.aoussou@iua.ci'],
        ];

        $count = 0;

        foreach ($etudiants as $ligne) {
            try {
                $etudiant = new L2MIAGE();
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

        $this->command->info("     - {$count} étudiants L2 MIAGE créés");
    }
}