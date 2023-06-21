import { comments } from "./data.js";

function countComments(comments) {
  let count = comments.length;

  for (const comment of comments) {
    if (comment.replies) {
      count += countComments(comment.replies);
    }
  }

  return count;
}
console.log(countComments(comments));
