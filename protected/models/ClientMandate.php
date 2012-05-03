<?php

Yii::import('application.models._base.BaseClientMandate');

class ClientMandate extends BaseClientMandate
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function getGps() {
        $gps = Gp::model()->findAll();
        $list =  array();
        foreach ($gps as $gp) {
            $list[$gp->id] = $gp->firm->name;
        }
        natcasesort($list);
        return $list;
    }
    
    public function LpItems($lps) {
        $list =  array();
        foreach ($lps as $lp) {
            $list[$lp->id] = $lp->firm->name;
        }
        natcasesort($list);
        return $list;
    }
    
    public function findLps($rank, $continent_ids, $region_ids, $sector_ids) {
        $lps = array();
        
        $lprank = Lp::model()->findAllByAttributes(array('rank' => $rank));
        foreach ($lprank as $r) {
            $lps[] = $r->id;
        }
        
        
        $continents = Continent::model()->findAllByPk($continent_ids);
        foreach ($continents as $c) {
            $lpc = $c->lpcontinents;
            foreach ($lpc as $a) {
                $lps[] = $a->lp_id;
            }
        }

        $regions = Region::model()->findAllByPk($region_ids);
        foreach ($regions as $r) {
            $lpr = $r->lpregions;
            foreach ($lpr as $a) {
                $lps[] = $a->lp_id;
            }
        }

        $sectors = Sector::model()->findAllByPk($sector_ids);
        foreach ($sectors as $s) {
            $lpse = $s->lpsectors;
            foreach ($lpse as $a) {
                $lps[] = $a->lp_id;
            }
        }

        return Lp::model()->findAllByPk($lps);
        //return $lps;
    }
    
    public function addLps($lps) {
        foreach ($lps as $lp) {
            $search = array('lp_id' => $lp, 'client_mandate_id' => $this->id);
            $exist = ClientMandateLp::model()->findAllByAttributes($search);
            if ( empty($exist)) {
                $cmlp = new ClientMandateLp();
                $cmlp->lp_id = $lp;
                $cmlp->client_mandate_id = $this->id;
                $cmlp->status = 1;
                if (!$cmlp->save()) {
                    throw new Exception('Error on add lp to client mandate.');
                }
            }
        }
    }
}
