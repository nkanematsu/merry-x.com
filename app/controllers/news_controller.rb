class NewsController < ApplicationController
    def index
        @articles = Article.where(published: true).order(created_at: 'desc')
    end

    def show
        @article = Article.find_by(id: params[:id], published: true)
    end
end
