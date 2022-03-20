<?php
namespace App\Models;

/**
 * @Entity
 * @Table(name="todos")
 */
class Todo {
    /**
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue
     */
    private ?int $id;

    /** 
     * @Column(name="name", type="string", length=250, nullable=false)
     */
    private string $name;
    
    /**
     * @Column(name="active", type="boolean", nullable=false)
     */
    private bool $active;

    public function __construct(string $name, bool $active=false)
    {
        $this->name = $name;
        $this->active = $active;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function isActive(): bool {
        return $this->active;
    }
}