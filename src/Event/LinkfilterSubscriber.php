<?php

/*
 * This file is part of the Eventum (Issue Tracking System) package.
 *
 * @copyright (c) Eventum Team
 * @license GNU General Public License, version 2 or later (GPL-2+)
 *
 * For the full copyright and license information,
 * please see the COPYING and AUTHORS files
 * that were distributed with this source code.
 */

namespace Eventum\Event;

use Link_Filter;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Workflow;

class LinkfilterSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            WorkflowEvents::LINKFILTER_FILTER => ['filter', 0],
        ];
    }

    public function filter(WorkflowEvent $event)
    {
        $prj_id = $event->prj_id;
        $text = $event->text;
        $filters = array_merge(Link_Filter::getFilters(), Link_Filter::getFiltersByProject($prj_id), Workflow::getLinkFilters($prj_id));

        foreach ((array)$filters as $filter) {
            list($pattern, $replacement) = $filter;
            // replacement may be a callback, provided by workflow
            if (is_callable($replacement)) {
                $text = preg_replace_callback($pattern, $replacement, $text);
            } else {
                $text = preg_replace($pattern, $replacement, $text);
            }
        }

        $event->text = $text;
    }
}
