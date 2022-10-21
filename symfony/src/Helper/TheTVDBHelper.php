<?php declare(strict_types=1);

namespace App\Helper;

use App\Entity\Episode;
use App\Entity\TvShow;
use App\Model\TheTVDB\Schema\EpisodeBaseRecord;

class TheTVDBHelper
{
    public static function createEpisodeByEpisodeBaseRecord(TvShow $show, EpisodeBaseRecord $episodeBaseRecord): Episode
    {
        $episode = new Episode();
        $episode->setName($episodeBaseRecord->name);
        $episode->setTheTvDbId($episodeBaseRecord->id);
        $episode->setSeasonNumber($episodeBaseRecord->seasonNumber);
        $episode->setNumber($episodeBaseRecord->number);
        $episode->setTvshow($show);

        return $episode;
    }
}
