<?php

namespace backend\models;

use yii\web\Linkable;

/**
 * This is the model class for table "tourpoint".
 *
 * @property integer $id
 * @property integer $idTour
 * @property integer $idPoint
 */
class TourPoint extends \yii\db\ActiveRecord implements Linkable
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tourpoint';
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdTour(): int
    {
        return $this->idTour;
    }

    /**
     * @param int $idTour
     */
    public function setIdTour(int $idTour)
    {
        $this->idTour = $idTour;
    }

    /**
     * @return int
     */
    public function getIdPoint(): int
    {
        return $this->idPoint;
    }

    /**
     * @param int $idPoint
     */
    public function setIdPoint(int $idPoint)
    {
        $this->idPoint = $idPoint;
    }

    /**
     * Returns a list of links.
     *
     * Each link is either a URI or a [[Link]] object. The return value of this method should
     * be an array whose keys are the relation names and values the corresponding links.
     *
     * If a relation name corresponds to multiple links, use an array to represent them.
     *
     * For example,
     *
     * ```php
     * [
     *     'self' => 'http://example.com/users/1',
     *     'friends' => [
     *         'http://example.com/users/2',
     *         'http://example.com/users/3',
     *     ],
     *     'manager' => $managerLink, // $managerLink is a Link object
     * ]
     * ```
     *
     * @return array the links
     */
    public function getLinks()
    {
        return [
            'self' => 'http://front.dev/index.php?r=point%2Fview&id=' . $this->getId(),
        ];
    }


}
