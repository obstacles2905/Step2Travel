<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 11.07.2017
 * Time: 18:18
 */

namespace backend\BLL\Services;


use backend\BLL\DTO\EventDTO;
use backend\DAL\Repositories\AREventRepository;
use backend\models\Event;


class EventService
{

    private $EventRepository;

    /**
     * EventService constructor.
     * @param $EventRepository
     * @param $EventCategoriesRepository
     */
    public function __construct(AREventRepository $EventRepository)
    {
        $this->EventRepository = $EventRepository;
    }

    private function check(EventDTO $dto)
    {
        if (strtotime($dto->date) < strtotime(date("Y-m-d H:i:s"))) {
            throw new \Exception('event date must be more than today\'s');
        }
        if (strtotime($dto->begin) >= strtotime($dto->end)) {
            throw new \Exception('event end time must be more than begin\'s');

        }

    }

    public function create(EventDTO $dto)
    {
        $this->check($dto);
        $event = new Event();
        $event->setName($dto->name);
        $event->setDescriptionEvent($dto->descriptionEvent);
        $event->setDate($dto->date);
        $event->setImageName($dto->image);
        $event->setCity($dto->city);
        $event->setBegin($dto->begin);
        $event->setEnd($dto->end);
        $event->setLongtitude($dto->longtitude);
        $event->setLatitude($dto->latitude);
        $event->setCategory($dto->category);
        $event->setId($this->EventRepository->create($event));
        return $event;
//        $e_cat=$this->EventRepository->get($event->getId());
//
//        foreach ($dto->categories as $cat)
//        {
//            $categories=new EventCategories();
//            $categories->setIdEvent($e_cat->getId());
//            $categories->setIdEventcategory($cat);
//            $this->EventCategoriesRepository->create($categories);
//        }

    }

    public function get($id)
    {
        return $this->EventRepository->get($id);
    }

    public function update(EventDTO $dto, $id)
    {
        $this->check($dto);
        $event = $this->get($id);
        $event->setName($dto->name);
        $event->setDescriptionEvent($dto->descriptionEvent);
        $event->setDate($dto->date);
        $event->setImageName($dto->image);
        $event->setCity($dto->city);
        $event->setBegin($dto->begin);
        $event->setEnd($dto->end);
        $event->setLongtitude($dto->longtitude);
        $event->setLatitude($dto->latitude);
        $event->setCategory($dto->category);
        $this->EventRepository->update($event);

//
//
//        foreach ($dto->categories as $cat)
//        {
//            $categories=$this->EventCategoriesRepository->get($category->getId());
//            $categories->setIdEvent($category->getId());
//            $categories->setIdEventcategory($cat);
//            $this->EventCategoriesRepository->update($categories);
//        }


    }

    public function delete($id)
    {
        $event = $this->get($id);
        $event->removeImages();
        $this->EventRepository->delete($event);
    }

    public function getAll()
    {
        return $this->EventRepository->getAll();
    }


    public function getAllApi()
    {
       return $this->EventRepository->getAllApi();
    }

    public function getCarousel($id_city)
    {
        return $this->EventRepository->getCarousel($id_city);
    }

    public function getOneApi($id)
    {
        return $this->EventRepository->getOneApi($id);
    }
}