<?php
namespace GreenCheap\Leylada;

use GreenCheap\Application as App;
use GreenCheap\Blog\Model\Post;

class Bootstrap
{
    protected $id;

    /**
     * Bootstrap
     */
    public function __construct()
    {
    }

    /**
     * @param id int
     */
    public function instanceBlogId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param operator string
     */
    public function getPreviousPost(string $operator = "<")
    {
        return $this->query($operator);
    }

    /**
     * @param operator string
     */
    public function getLastPost(string $operator = ">")
    {
        return $this->query($operator);
    }

    /**
     * @param operator string
     */
    protected function query(string $operator)
    {
        $order = match($operator){
            '<' => 'desc',
            default => 'asc'
        };

        $query = Post::query()
            ->where(["status = :status", "date < :date"], ["status" => Post::getStatus("STATUS_PUBLISHED"), "date" => new \DateTime()])
            ->where(function ($query) {
                return $query->where("roles IS NULL")->whereInSet("roles", App::user()->roles, false, "OR");
            });
        $query->where("id $operator :id", ["id" => $this->id])->orderBy('id', $order);
        return $query->first();
    }
}
?>