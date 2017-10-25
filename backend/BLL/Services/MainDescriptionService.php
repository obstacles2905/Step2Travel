<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:18
 */

namespace backend\BLL\Services;


use backend\BLL\DTO\MainDescriptionDTO;

use backend\DAL\Repositories\ARMainDescriptionRepository;

use backend\models\MainDescription;

class MainDescriptionService
{

    private $MaindescriptionRepository;

    /**
     * MainDescriptionService constructor.
     * @param $MaindescriptionRepository
     */
    public function __construct(ARMainDescriptionRepository $MaindescriptionRepository)
    {
        $this->MaindescriptionRepository = $MaindescriptionRepository;
    }


    public function create(MainDescriptionDTO $dto)
    {
        $main = new MainDescription();
        $main->setIntroText($dto->introText);
        $main->setVideoURL($dto->videoURL);
        $main->setVideoText($dto->videoText);
        $main->setShow($dto->show);
        $this->MaindescriptionRepository->create($main);

    }

    public function get($id)
    {
        return $this->MaindescriptionRepository->get($id);
    }

    public function update(MainDescriptionDTO $dto, $id)
    {

        $main = $this->get($id);
        $main->setIntroText($dto->introText);
        $main->setVideoURL($dto->videoURL);
        $main->setVideoText($dto->videoText);
        $main->setShow($dto->show);
        $this->MaindescriptionRepository->update($main);

    }

    public function delete($id)
    {
        $main=$this->get($id);
        $this->MaindescriptionRepository->delete($main);
    }
    public function getAll()
    {
        return $this->MaindescriptionRepository->getAll();
    }

    public function getSeen()
    {
        if ( MainDescription::findAll(['show'=>true])==null) {
            $main_new = MainDescription::findOne(['show' => false]);
            $main_new->show = true;
            $main_new->save();
            return $main_new;
        }
        else {
            return MainDescription::findOne(['show' => true]);
        }
    }
}