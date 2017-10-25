<?php
/**
 * Created by PhpStorm.
 * User: Volodya
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace backend\DAL\Repositories;

use backend\DAL\Interfaces\IEventRepository;

use backend\models\Event;

use SebastianBergmann\GlobalState\RuntimeException;
use backend\DAL\Interfaces\NotFoundException;
use Yii;

class AREventRepository implements IEventRepository
{


    public function getAll()
    {
        if (!$event = Event::find()->all()) {
            throw new NotFoundException('Event not found');
        }
        return $event;
    }

    public function get($id)
    {
        $event = Event::findOne($id);
        if (!$event) {
            throw new NotFoundException('Event not found');
        }

        return $event;
    }

    public function create(Event $item)
    {
        if (!$item->insert())
            throw new RuntimeException('can\'t create');
        return $item->getPrimaryKey();
    }

    public function update(Event $item)
    {
        if (!$item->save())
            throw new RuntimeException('can\'t update');
    }

    public function delete(Event $item)
    {
        if (!$item->delete())
            throw new RuntimeException('can\'t delete');
    }

    public function getAllApi()
    {
        $events = $this->getAll();
        foreach ($events as $event) {
            $this->formatData($event, 640, 450);
        }
        return $events;
    }

    public function getCarousel($id_city)
    {
        \Yii::$app->formatter->locale = 'uk-UA';
        if (!$events = Event::find()->select(['id', 'name', 'date', 'image'])->where(['city' => $id_city])->orderBy(['date' => SORT_ASC, 'begin' => SORT_ASC])->limit(10)->all()) {
            $events = Event::find()->select(['id', 'name', 'date', 'image'])->orderBy(['date' => SORT_ASC, 'begin' => SORT_ASC])->limit(10)->all();
        }
        if (!$events)
            throw new NotFoundException('no data for carousel');
        foreach ($events as $event) {
            $event['date'] = \Yii::$app->formatter->asDate($event->getDate(), 'MM/dd/y');
            $event['month'] = mb_convert_case(\Yii::$app->formatter->asDate($event['date'], 'MMMM'), MB_CASE_TITLE);
            $event['image'] = Yii::getAlias('@server') . $event->getImage()->getUrl('300x300');
        }
        return $events;
    }

    public function getOneApi($id)
    {
        $event = $this->get($id);
        $this->formatData($event, 1980, 1080);
        return $event;

    }

    private function formatData(Event &$event, $imageWidth, $imageHeight)
    {
        \Yii::$app->formatter->locale = 'uk-UA';
        $event['city'] = $event->getCity()->getName();
        $event['category'] = $event->getCategoryFull();
        $event['date'] = \Yii::$app->formatter->asDate($event->getDate(), 'MM/dd/y');
        $event['begin'] = \Yii::$app->formatter->asTime($event->getBegin(), 'H:mm');
        $event['end'] = \Yii::$app->formatter->asTime($event->getEnd(), 'H:mm');
        $event['month'] = mb_convert_case(\Yii::$app->formatter->asDate($event['date'], 'MMMM'), MB_CASE_TITLE);
        $event['image'] = Yii::getAlias('@server') . $event->getImage()->getUrl($imageWidth . 'x'. $imageHeight);
    }
}