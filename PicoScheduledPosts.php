<?php

class PicoScheduledPosts extends AbstractPicoPlugin
{
	const API_VERSION = 2;

	protected $enabled = false;

	public function onPagesLoaded(&$pages)
	{
		$now = new \DateTime;

		$pages = array_filter($pages, function ($page) use ($now) {
			if (empty($page['date'] ?? null)) {
				return true;
			}

			return ($now < (new \DateTime($page['date']))) ? false : true;
		});
	}
}
