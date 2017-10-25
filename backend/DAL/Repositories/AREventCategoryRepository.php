<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;



use backend\DAL\Interfaces\IEventCategoryRepository;
use backend\models\EventCategory;
use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;


class AREventCategoryRepository implements IEventCategoryRepository
{

    public function getAll()
    {
        if (!$event=EventCategory::find()->all())
        {
            throw new NotFoundException('Event categories not found');
        }
        return $event;
    }

    public function get($id)
    {
        $event=EventCategory::findOne($id);
        if (!$event)
        {
            throw new NotFoundException('Event category not found');
        }
        return $event;
    }

    public function create(EventCategory $item)
    {
       if (!$item->insert())
           throw new RuntimeException('can\'t create');

    }

    public function update(EventCategory $item)
    {
        if (!$item->update())
            throw new RuntimeException('can\'t update');
    }

    public function delete(EventCategory $item)
    {
        if(!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getAllApi()
    {
        if(!$types=EventCategory::findBySql('select event_category.id,event_category.name from event_category where event_category.id in(select event.category from event)')->all())
        {
            throw new NotFoundException('Event type not found');
        }
        return $types;
    }
}