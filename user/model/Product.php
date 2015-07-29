<?php
namespace Model;
/**
 * @Entity @Table(name="products")
 **/
class Product
{
        /** @Id @Column(type="integer") @GeneratedValue **/
        private  $id;
        /** @Column(type="string") **/
        private  $name;

        public function getId()
        {
        return $this->id;
        }

        public function getName()
        {
        return $this->name;
        }

        public function setName($name)
        {
        $this->name = $name;
        }
    }