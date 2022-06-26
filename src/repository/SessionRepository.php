<?php

require_once "Repository.php";
require_once __DIR__."/../model/security/Session.php";

class SessionRepository extends Repository {

    private static string $SELECT_BY_SID_AND_UID = "SELECT validto, active FROM public.sessions WHERE sid = :sid AND uid = :uid";
    private static string $UPDATE_DEACTIVATE_BY_UID_AND_ACTIVE = "UPDATE public.sessions SET active = false WHERE uid = :uid AND active = true";
    private static string $UPDATE_DEACTIVATE_BY_SID = "UPDATE public.sessions SET active = false WHERE sid = :sid";
    private static string $UPDATE_BY_SID_AND_UID = "UPDATE public.sessions SET validto = :validto WHERE sid = :sid AND uid = :uid AND active = true";
    private static string $INSERT = "INSERT INTO public.sessions (sid, uid, validto, active) VALUES (:sid, :uid, :validTo, :active)";

    public function getSessionValidDateBySidAndUid(string $sid, string $uid): ?Session {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$SELECT_BY_SID_AND_UID);
        $stmt->bindParam(':sid', $sid);
        $stmt->bindParam(':uid', $uid);
        $stmt->execute();

        $session = $stmt->fetch(PDO::FETCH_ASSOC);

        $connection = null;
        if ($session) {
            return new Session($session["validto"], $session["active"]);
        } {
            return null;
        }
    }

    public function updateSessionTimeLife(string $sid, string $uid, string $validTo): bool {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$UPDATE_BY_SID_AND_UID);
        $stmt->bindParam(':sid', $sid);
        $stmt->bindParam(':uid', $uid);
        $stmt->bindParam(':validto', $validTo);
        $stmt->execute();

        $successfully = $stmt->execute();

        $connection = null;

        return $successfully;
    }

    public function deactivateSessionForUid(string $uid): bool {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$UPDATE_DEACTIVATE_BY_UID_AND_ACTIVE);
        $stmt->bindParam(':uid', $uid);
        $stmt->execute();

        $successfully = $stmt->execute();

        $connection = null;

        return $successfully;
    }

    public function deactivateSessionForSid(string $sid): bool {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$UPDATE_DEACTIVATE_BY_SID);
        $stmt->bindParam(':sid', $sid);
        $stmt->execute();

        $successfully = $stmt->execute();

        $connection = null;

        return $successfully;
    }

    public function createSession(string $sid, string $uid, string $validTo, bool $active): bool {

        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$INSERT);

        $stmt->bindParam(':sid', $sid);
        $stmt->bindParam(':uid', $uid);
        $stmt->bindParam(':validTo', $validTo);
        $stmt->bindParam(':active', $active);
        $inserted = $stmt->execute();
        $connection = null;
        return $inserted;
    }
}