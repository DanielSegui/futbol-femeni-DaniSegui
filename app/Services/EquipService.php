<?php
namespace App\Services;

use App\Repositories\EquipRepository;

class EquipService {
    public function __construct(private EquipRepository $repo) {}

    public function llistar() {
        return $this->repo->getAll();
    }

    public function trobar($id){
        return $this->repo->find($id);
    }

    public function guardar(array $data) {
        return $this->repo->create($data);
    }

    public function actualitzar($id, array $data) {
        return $this->repo->update($id, $data);
    }

    public function eliminar($id) {
        return $this->repo->delete($id);
    }
    public function edatMitjana($equip) {
        $jugadoras = $equip->jugadoras;

        if (empty($jugadoras)) return 0;

        $edats = array_map(fn($j) => Carbon::parse($j->data_naixement)->age, $jugadoras);
        return round(array_sum($edats)/count($edats), 1);
    }

    public function ultimsPartits($equip, $limit = 5) {
        $partits = $equip->partits;

        usort($partits, fn($a, $b) => strtotime($b->data) - strtotime($a->data));

        return array_slice($partits, 0, $limit);
    }
}