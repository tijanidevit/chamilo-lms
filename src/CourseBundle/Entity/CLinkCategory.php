<?php

/* For licensing terms, see /license.txt */

namespace Chamilo\CourseBundle\Entity;

use Chamilo\CoreBundle\Entity\AbstractResource;
use Chamilo\CoreBundle\Entity\ResourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CLinkCategory.
 *
 * @ORM\Table(
 *  name="c_link_category",
 *  indexes={
 *  }
 * )
 * @ORM\Entity
 */
class CLinkCategory extends AbstractResource implements ResourceInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="iid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $iid;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(name="category_title", type="string", length=255, nullable=false)
     */
    protected string $categoryTitle;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected ?string $description;

    /**
     * @var int
     *
     * @ORM\Column(name="display_order", type="integer", nullable=false)
     */
    protected $displayOrder;

    /**
     * @var ArrayCollection|CLink[]
     *
     * @ORM\OneToMany(targetEntity="Chamilo\CourseBundle\Entity\CLink", mappedBy="category")
     */
    protected $links;

    public function __construct()
    {
        $this->description = '';
        $this->displayOrder = 0;
        $this->links = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getCategoryTitle();
    }

    public function getIid(): int
    {
        return $this->iid;
    }

    /**
     * Set categoryTitle.
     *
     * @param string $categoryTitle
     *
     * @return CLinkCategory
     */
    public function setCategoryTitle($categoryTitle)
    {
        $this->categoryTitle = $categoryTitle;

        return $this;
    }

    /**
     * Get categoryTitle.
     */
    public function getCategoryTitle(): string
    {
        return $this->categoryTitle;
    }

    /**
     * Set description.
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set displayOrder.
     *
     * @param int $displayOrder
     *
     * @return CLinkCategory
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;

        return $this;
    }

    /**
     * Get displayOrder.
     *
     * @return int
     */
    public function getDisplayOrder()
    {
        return $this->displayOrder;
    }

    public function getResourceIdentifier(): int
    {
        return $this->iid;
    }

    public function getResourceName(): string
    {
        return $this->getCategoryTitle();
    }

    public function setResourceName(string $name): self
    {
        return $this->setCategoryTitle($name);
    }
}
