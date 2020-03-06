<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200306172915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
            INSERT INTO `excluded_word` (`id`, `value`) VALUES 
            (1, 'the'),
            (2, 'be'),
            (3, 'to'),
            (4, 'of'),
            (5, 'and'),
            (6, 'a'),
            (7, 'in'),
            (8, 'that'),
            (9, 'have'),
            (10, 'I'),
            (11, 'it'),
            (12, 'for'),
            (13, 'not'),
            (14, 'on'),
            (15, 'with'),
            (16, 'he'),
            (17, 'as'),
            (18, 'you'),
            (19, 'do'),
            (20, 'at'),
            (21, 'this'),
            (22, 'but'),
            (23, 'his'),
            (24, 'by'),
            (25, 'from'),
            (26, 'they'),
            (27, 'we'),
            (28, 'say'),
            (29, 'her'),
            (30, 'she'),
            (31, 'or'),
            (32, 'an'),
            (33, 'will'),
            (34, 'my'),
            (35, 'one'),
            (36, 'all'),
            (37, 'would'),
            (38, 'there'),
            (39, 'their'),
            (40, 'what'),
            (41, 'so'),
            (42, 'up'),
            (43, 'out'),
            (44, 'if'),
            (45, 'about'),
            (46, 'who'),
            (47, 'get'),
            (48, 'which'),
            (49, 'go'),
            (50, 'me')
          ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM  `excluded_word` WHERE `id` > 0 AND `id` < 51");
    }
}
