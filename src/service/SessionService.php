<?php

require_once __DIR__."/../repository/SessionRepository.php";

class SessionService {
    private SessionRepository $sessionRepository;
    private int $validityTimeS = 180;

    public function __construct() {
        $this->sessionRepository = new SessionRepository();
    }

    public function isSessionValid(string $sid, string $uid): bool {
        $session = $this->sessionRepository->getSessionValidDateBySidAndUid($sid, $uid);
        if ($session) {
            $validTo = $this->extractSessionValidTo($session);
            $now = new DateTime();
            return $session->isActive() && $now < $validTo;
        } else {
            return false;
        }

    }

    public function updateSessionTimeLife(string $sid, string $uid): bool {
        $validToTS = $this->nowTimestamp() + $this->validityTimeS;
        $validTo = date("Y-m-d H:i:s", $validToTS);
        return $this->sessionRepository->updateSessionTimeLife($sid, $uid, $validTo, true);
    }

    public function createSession(string $sid, string $uid): bool {
        $validToTS = $this->nowTimestamp() + $this->validityTimeS;
        $validTo = date("Y-m-d H:i:s", $validToTS);
        return $this->sessionRepository->createSession($sid, $uid, $validTo, true);
    }

    public function deactivateSessionForUid(string $uid): bool {
        return $this->sessionRepository->deactivateSessionForUid($uid);
    }

    public function deactivateSessionForSid(string $sid): bool {
        return $this->sessionRepository->deactivateSessionForSid($sid);
    }

    private function nowTimestamp(): int {
        $date = new DateTime();
        return $date->getTimestamp();
    }

    public function extractSessionValidTo(?Session $session): DateTime {
        if (!isset($session)) {
            $ts = 1483228800;
            $validTo = new DateTime();
            $validTo->setTimestamp($ts);
        } else {
            $ts = $session->getValidTo();
            $validTo = DateTime::createFromFormat('Y-m-d H:i:sT', $ts);
        }
        return $validTo;
    }

}