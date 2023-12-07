async function handleVoteQuestion(userId, questionId, vote) {
    const url = "/api/questions/vote";
    const data = { id_user: userId, id_question: questionId, vote: vote };
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    const response = await fetch(url, {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
    });
    return await response;
}

async function handleVoteAnswer(userId, answerId, vote) {
    const url = "/api/answers/vote";
    const data = { id_user: userId, id_answer: answerId, vote: vote };
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    const response = await fetch(url, {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
    });
    return await response;
}

async function userHasVotedQuestion(userId, questionId) {
    const url = '/api/questions/vote?' + encodeForAjax({ id_user: userId, id_question: questionId });
    const response = await fetch(url);
    return await response;
}

async function userHasVotedAnswer(userId, answerId) {
    const url = '/api/answers/vote?' + encodeForAjax({ id_user: userId, id_answer: answerId });
    const response = await fetch(url);
    return await response;
}

document.querySelectorAll(".question-upvotes").forEach(async function (element) {
    const questionId = element.getAttribute("data-question-id");
    const checkVote = await userHasVotedQuestion(userId, questionId);
    if (checkVote.ok) {
        const data = await checkVote.json();
        console.log(data);
        if (data.hasVoted === true && data.vote === true) {
            element.firstElementChild.firstElementChild.setAttribute("fill", "#38B6FF");
            element.style.color = "#38B6FF";
        }
    }
    element.addEventListener("click", async () => {
        const response = await handleVoteQuestion(userId, questionId, true);
        if (response.ok) {
            const data = await response.json();
            element.textContent = data.likes;
            element.firstElementChild.firstElementChild.setAttribute("fill", "#38B6FF");
            element.style.color = "#38B6FF";
        }

    });
});

document.querySelectorAll(".question-downvotes").forEach(async function (element) {
    const questionId = element.getAttribute("data-question-id");
    const checkVote = await userHasVotedQuestion(userId, questionId);
    if (checkVote.ok) {
        const data = await checkVote.json();
        if (data.hasVoted === true && data.vote === false) {
            element.firstElementChild.firstElementChild.setAttribute("fill", "#38B6FF");
            element.style.color = "#38B6FF";
        }
    }
    element.addEventListener("click", async () => {
        const response = await handleVoteQuestion(userId, questionId, false);
        if (response.ok) {
            const data = await response.json();
            element.textContent = data.dislikes;
            element.firstElementChild.firstElementChild.setAttribute("fill", "#38B6FF");
            element.style.color = "#38B6FF";
        }

    });
});

document.querySelectorAll(".answer-upvotes").forEach(async function (element) {
    const answerId = element.getAttribute("data-answer-id");
    const checkVote = await userHasVotedAnswer(userId, answerId);
    if (checkVote.ok) {
        const data = await checkVote.json();
        if (data.hasVoted === true && data.vote === true) {
            element.firstElementChild.firstElementChild.setAttribute("fill", "#38B6FF");
            element.style.color = "#38B6FF";
        }
    }
    element.addEventListener("click", async () => {
        const response = await handleVoteAnswer(userId, answerId, true);
        if (response.ok) {
            const data = await response.json();
            element.nextElementSibling.textContent = data.balance;
            element.firstElementChild.firstElementChild.setAttribute("fill", "#38B6FF");
            element.style.color = "#38B6FF";
        }

    });
});

document.querySelectorAll(".answer-downvotes").forEach(async function (element) {
    const answerId = element.getAttribute("data-answer-id");
    const checkVote = await userHasVotedAnswer(userId, answerId);
    if (checkVote.ok) {
        const data = await checkVote.json();
        if (data.hasVoted === true && data.vote === false) {
            element.firstElementChild.firstElementChild.setAttribute("fill", "#38B6FF");
            element.style.color = "#38B6FF";
        }
    }
    element.addEventListener("click", async () => {
        const response = await handleVoteAnswer(userId, answerId, false);
        if (response.ok) {
            const data = await response.json();
            element.previousElementSibling.textContent = data.balance;
            element.firstElementChild.firstElementChild.setAttribute("fill", "#38B6FF");
            element.style.color = "#38B6FF";
        }

    });
});
