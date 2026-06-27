<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Ministere;
use App\Models\Direction;
use App\Models\ServiceInterne;
use App\Models\Citoyen;
use App\Models\ServicePublic;
use App\Models\Demande;
use App\Models\AgentPublic;

class SnaeSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make('admin123');

        $ministeres = [
            ['Ministère de l’Intérieur - État civil', 'Actes de naissance, mariage, décès, nationalité et documents d’identité.'],
            ['Ministère des Finances - Fiscalité', 'Déclarations fiscales, attestations, quittances et contribuables.'],
            ['Ministère de l’Éducation nationale', 'Examens, diplômes, attestations, bourses et inscriptions.'],
            ['Ministère de la Santé', 'Certificats médicaux, vaccination et autorisations sanitaires.'],
            ['Ministère de la Fonction publique', 'Agents publics, carrières, congés, affectations et paie.'],
            ['Ministère de la Justice', 'Casier judiciaire, certificats judiciaires et actes juridiques.'],
            ['Ministère du Commerce', 'Entreprises, RCCM, patentes et autorisations commerciales.'],
            ['Ministère des Transports', 'Permis, cartes grises, véhicules et contrôle technique.'],
            ['Ministère de l’Agriculture', 'Exploitants agricoles, coopératives et subventions.'],
            ['Ministère de la Jeunesse et des Sports', 'Associations, activités sportives et jeunesse.'],
            ['Ministère des Affaires sociales', 'Aides sociales, handicap et familles vulnérables.'],
        ];

        foreach ($ministeres as $m) {
            $ministere = Ministere::firstOrCreate(['nom' => $m[0]], ['description' => $m[1]]);
            $direction = Direction::firstOrCreate(['ministere_id' => $ministere->id, 'nom' => 'Direction générale']);
            ServiceInterne::firstOrCreate([
                'ministere_id' => $ministere->id,
                'direction_id' => $direction->id,
                'nom' => 'Service principal',
            ]);
        }

        User::updateOrCreate(['email' => 'admin@snae-rca.cf'], [
            'name' => 'Administrateur National',
            'password' => $password,
            'role' => 'admin',
            'statut' => 'actif',
        ]);

        $agents = [
            ['etatcivil@snae-rca.cf', 'Agent État civil', 1],
            ['fiscalite@snae-rca.cf', 'Agent Fiscalité', 2],
            ['education@snae-rca.cf', 'Agent Éducation', 3],
            ['sante@snae-rca.cf', 'Agent Santé', 4],
            ['fonctionpublique@snae-rca.cf', 'Agent Fonction publique', 5],
            ['justice@snae-rca.cf', 'Agent Justice', 6],
            ['commerce@snae-rca.cf', 'Agent Commerce', 7],
            ['transports@snae-rca.cf', 'Agent Transports', 8],
            ['agriculture@snae-rca.cf', 'Agent Agriculture', 9],
            ['jeunesse@snae-rca.cf', 'Agent Jeunesse et Sports', 10],
            ['social@snae-rca.cf', 'Agent Affaires sociales', 11],
        ];

        foreach ($agents as $a) {
            User::updateOrCreate(['email' => $a[0]], [
                'name' => $a[1],
                'password' => $password,
                'role' => 'agent_public',
                'ministere_id' => $a[2],
                'service_interne_id' => $a[2],
                'statut' => 'actif',
            ]);
        }

        $citoyenUsers = [
            ['citoyen@snae-rca.cf', 'Citoyen Test'],
            ['samba@snae-rca.cf', 'SAMBA MALICK N’Diaye'],
            ['marie.kette@snae-rca.cf', 'Marie Kette'],
            ['jean.mbala@snae-rca.cf', 'Jean Mbala'],
            ['sarah.dako@snae-rca.cf', 'Sarah Dako'],
        ];

        foreach ($citoyenUsers as $u) {
            User::updateOrCreate(['email' => $u[0]], [
                'name' => $u[1],
                'password' => $password,
                'role' => 'citoyen',
                'statut' => 'actif',
            ]);
        }

        $citoyens = [
            ['citoyen@snae-rca.cf', 'RCA-000001', 'Citoyen', 'Test', 'Masculin', '1994-03-15', 'Bangui', '75000001', 'Bangui Centre', 'Bangui', 'Bangui', 'Étudiant'],
            ['samba@snae-rca.cf', 'RCA-1285394', 'SAMBA MALICK', "N'Diaye", 'Masculin', '1998-06-12', 'Bangui', '75000002', 'Bimbo', 'Ombella-Mpoko', 'Bimbo', 'Développeur'],
            ['marie.kette@snae-rca.cf', 'RCA-000002', 'KETTE', 'Marie', 'Féminin', '1990-08-20', 'Bangui', '75000003', 'Boy-Rabe', 'Bangui', 'Bangui', 'Commerçante'],
            ['jean.mbala@snae-rca.cf', 'RCA-000003', 'MBALA', 'Jean', 'Masculin', '1987-11-04', 'Bimbo', '75000004', 'Bimbo Centre', 'Ombella-Mpoko', 'Bimbo', 'Entrepreneur'],
            ['sarah.dako@snae-rca.cf', 'RCA-000004', 'DAKO', 'Sarah', 'Féminin', '1995-12-09', 'Bambari', '75000005', 'Bambari Centre', 'Ouaka', 'Bambari', 'Enseignante'],
        ];

        foreach ($citoyens as $c) {
            $user = User::where('email', $c[0])->first();
            Citoyen::updateOrCreate(['nni' => $c[1]], [
                'user_id' => $user->id,
                'nom' => $c[2],
                'prenom' => $c[3],
                'sexe' => $c[4],
                'date_naissance' => $c[5],
                'lieu_naissance' => $c[6],
                'nationalite' => 'Centrafricaine',
                'telephone' => $c[7],
                'email' => $c[0],
                'adresse' => $c[8],
                'prefecture' => $c[9],
                'commune' => $c[10],
                'profession' => $c[11],
            ]);
        }

        $servicesPublics = [
            [1, 'Demande d’acte de naissance', 'Duplicata d’acte de naissance.', '72 heures', 1000],
            [1, 'Acte de mariage', 'Demande d’acte de mariage officiel.', '72 heures', 1500],
            [1, 'Certificat de nationalité', 'Certificat de nationalité.', '7 jours', 3000],
            [2, 'Attestation de régularité fiscale', 'Attestation fiscale.', '5 jours', 5000],
            [2, 'Déclaration fiscale annuelle', 'Déclaration fiscale annuelle.', '7 jours', 0],
            [2, 'Quittance fiscale', 'Quittance après paiement.', '48 heures', 2000],
            [3, 'Attestation de réussite', 'Attestation scolaire ou universitaire.', '7 jours', 2000],
            [3, 'Demande de diplôme', 'Diplôme ou duplicata.', '15 jours', 5000],
            [3, 'Demande de bourse scolaire', 'Dossier de bourse.', '30 jours', 0],
            [4, 'Certificat médical administratif', 'Certificat médical administratif.', '48 heures', 3000],
            [4, 'Certificat de vaccination', 'Attestation de vaccination.', '48 heures', 1000],
            [4, 'Autorisation sanitaire', 'Autorisation sanitaire.', '7 jours', 5000],
            [5, 'Attestation de service', 'Attestation administrative pour agent public.', '72 heures', 0],
            [5, 'Demande de congé agent public', 'Congé administratif.', '5 jours', 0],
            [5, 'Demande de mutation', 'Affectation ou mutation.', '15 jours', 0],
            [6, 'Casier judiciaire', 'Extrait de casier judiciaire.', '7 jours', 3000],
            [6, 'Certificat de non-poursuite', 'Certificat de non-poursuite.', '7 jours', 3000],
            [7, 'Immatriculation entreprise', 'Immatriculation commerciale.', '10 jours', 10000],
            [7, 'Autorisation commerciale', 'Autorisation commerciale.', '7 jours', 5000],
            [8, 'Permis de conduire', 'Permis ou renouvellement.', '15 jours', 10000],
            [8, 'Carte grise', 'Carte grise véhicule.', '10 jours', 15000],
            [9, 'Enregistrement exploitant agricole', 'Exploitant agricole.', '7 jours', 0],
            [9, 'Demande de subvention agricole', 'Subvention agricole.', '30 jours', 0],
            [10, 'Enregistrement association jeunesse', 'Association jeunesse.', '10 jours', 3000],
            [10, 'Autorisation manifestation sportive', 'Événement sportif.', '7 jours', 5000],
            [11, 'Demande d’aide sociale', 'Aide sociale.', '15 jours', 0],
            [11, 'Carte personne handicapée', 'Carte handicap.', '15 jours', 0],
        ];

        foreach ($servicesPublics as $s) {
            ServicePublic::updateOrCreate(['ministere_id' => $s[0], 'nom' => $s[1]], [
                'service_interne_id' => $s[0],
                'description' => $s[2],
                'delai_traitement' => $s[3],
                'cout' => $s[4],
            ]);
        }

        $demandes = [
            ['RCA-2026-000001', 'RCA-000001', 'Demande d’acte de naissance', 'Demande acte de naissance', 'Demande de duplicata pour dossier scolaire.', 'En attente', 'Dépôt citoyen'],
            ['RCA-2026-000002', 'RCA-1285394', 'Attestation de régularité fiscale', 'Attestation fiscale SAMBA', 'Demande d’attestation fiscale pour dossier administratif.', 'En cours', 'Traitement agent'],
            ['RCA-2026-000003', 'RCA-1285394', 'Demande d’acte de naissance', 'Acte de naissance SAMBA', 'Demande de copie intégrale d’acte de naissance.', 'Traitée', 'Document délivré'],
            ['RCA-2026-000004', 'RCA-000002', 'Attestation de réussite', 'Attestation scolaire', 'Attestation pour inscription universitaire.', 'Traitée', 'Document délivré'],
            ['RCA-2026-000005', 'RCA-000003', 'Immatriculation entreprise', 'Création entreprise', 'Immatriculation d’une entreprise commerciale.', 'En cours', 'Traitement agent'],
            ['RCA-2026-000006', 'RCA-000004', 'Certificat médical administratif', 'Certificat médical', 'Certificat pour dossier administratif.', 'En attente', 'Dépôt citoyen'],
            ['RCA-2026-000007', 'RCA-000001', 'Casier judiciaire', 'Casier judiciaire', 'Casier judiciaire pour concours.', 'Refusée', 'Dossier incomplet'],
            ['RCA-2026-000008', 'RCA-000003', 'Permis de conduire', 'Renouvellement permis', 'Renouvellement du permis de conduire.', 'En attente', 'Dépôt citoyen'],
            ['RCA-2026-000009', 'RCA-000002', 'Demande d’aide sociale', 'Aide sociale familiale', 'Aide sociale pour famille vulnérable.', 'En cours', 'Traitement agent'],
            ['RCA-2026-000010', 'RCA-1285394', 'Attestation de service', 'Attestation de service', 'Attestation administrative de service.', 'En attente', 'Dépôt citoyen'],
        ];

        foreach ($demandes as $d) {
            $citoyen = Citoyen::where('nni', $d[1])->first();
            $service = ServicePublic::where('nom', $d[2])->first();
            if ($citoyen && $service) {
                Demande::updateOrCreate(['numero_dossier' => $d[0]], [
                    'citoyen_id' => $citoyen->id,
                    'service_public_id' => $service->id,
                    'objet' => $d[3],
                    'description' => $d[4],
                    'statut' => $d[5],
                    'etape_workflow' => $d[6],
                ]);
            }
        }

        $agentsPublics = [
            ['MFP-0001', 'NDIAYE', 'Samba Malick', 'Masculin', 'Ministère de la Fonction publique', 'DRH', 'Gestion des carrières', 'Administrateur civil', '2e échelon', '2020-01-15', 'Actif'],
            ['MFP-0002', 'KETTE', 'Marie', 'Féminin', 'Ministère de la Fonction publique', 'DRH', 'Administration du personnel', 'Attaché administratif', '1er échelon', '2019-03-10', 'Actif'],
            ['MFP-0003', 'MBALA', 'Jean', 'Masculin', 'Ministère des Finances', 'Direction de la solde', 'Paie', 'Agent administratif', '3e échelon', '2018-05-20', 'Actif'],
            ['MFP-0004', 'DAKO', 'Sarah', 'Féminin', 'Ministère de la Santé', 'Administration sanitaire', 'Ressources humaines', 'Attaché administratif', '2e échelon', '2021-09-01', 'Actif'],
            ['MFP-0005', 'KOLINGBA', 'Emmanuel', 'Masculin', 'Ministère de l’Éducation nationale', 'Examens', 'Gestion administrative', 'Administrateur civil', '1er échelon', '2017-02-10', 'Suspendu'],
            ['MFP-0006', 'YAKITÉ', 'Aline', 'Féminin', 'Ministère de la Justice', 'Affaires judiciaires', 'Greffe', 'Agent administratif', '4e échelon', '2016-07-22', 'Actif'],
        ];

        foreach ($agentsPublics as $a) {
            AgentPublic::updateOrCreate(['matricule' => $a[0]], [
                'nom' => $a[1],
                'prenom' => $a[2],
                'sexe' => $a[3],
                'ministere' => $a[4],
                'direction' => $a[5],
                'service' => $a[6],
                'grade' => $a[7],
                'echelon' => $a[8],
                'date_recrutement' => $a[9],
                'statut' => $a[10],
            ]);
        }
    }
}
