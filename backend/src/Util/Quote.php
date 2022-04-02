<?php


namespace App\Util;


use App\Entity\Common\Hadis;
use Doctrine\ORM\EntityManagerInterface;

class Quote
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * Quote constructor.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getQuote()
    {
        $id = mt_rand(0, 5209);

        $quotes = new Quotes();
        $quote = $quotes->quotes()[$id];

        if (!$quote) {
            return '';
        }

        return "\n\n" . $quote->getBody();
    }
}