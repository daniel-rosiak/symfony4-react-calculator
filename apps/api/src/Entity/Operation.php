<?php

namespace App\Entity;

use App\Traits\Entity\FieldCreated;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Operation
 *
 * @ORM\Table(name="operations")
 * @ORM\Entity(repositoryClass="App\Repository\OperationRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Operation
{
    use FieldCreated;

    /**
     * @var int
     * @Serializer\Type("int")
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Groups({"default", "index"})
     */
    private $id;

    /**
     * @var array
     * @Serializer\Type("array")
     *
     * @ORM\Column(name="arguments", type="json", nullable=false)
     * @Serializer\Groups({"default"})
     */
    protected $arguments;

    /**
     * @var string
     * @Serializer\Type("string")
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     * @Serializer\Groups({"default"})
     */
    protected $type;

    /**
     * @var string
     * @Serializer\Type("string")
     *
     * @ORM\Column(name="result", type="string")
     * @Serializer\Groups({"default"})
     */
    protected $result;

    /**
     * @return int|null
     */
    public function getId() : ?int
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @param array $arguments
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param string $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }
}
